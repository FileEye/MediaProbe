<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a map of values, for Canon Camera information.
 *
 * In this case, instead of accessing the data sequentially, we determine the
 * CameraInfo map to use and access it directly.
 */
class Map extends Index
{
    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

        $this->validate($data_element);

        // Load the map as a raw data block.
        $map_data_definition = new ItemDefinition(Collection::get('RawData', ['name' => 'mapdata']), ItemFormat::BYTE);
        $map = new RawData($map_data_definition, $this);
        $map->parseData($data_element);

        $i = 0;
        $offset = 0;
        $size = $this->getDefinition()->getSize();
        foreach ($this->getCollection()->listItemIds() as $item) {
            // Adds the 'tag'.
            try {
                $n = $offset + ($item * ItemFormat::getSize($this->getFormat()));

                // todo xx manage better the out-of-bounds
                if ($n > $offset + $size - 1) {
                    throw new DataException("Offset $n out of bounds");
                }

                $item_definition = $this->getItemDefinitionFromData($i, $item, $data_element, $n);
                $item_class = $item_definition->getCollection()->getPropertyValue('class');
                $item = new $item_class($item_definition, $this);
                $item_data_window = new DataWindow($data_element, $item_definition->getDataOffset(), $item_definition->getSize());
                $item->parseData($item_data_window);
            } catch (DataException $e) {
                $this->notice($e->getMessage());
            }

            $i++;
        }

        $this->valid = true;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $data_bytes = $this->getElement("rawData[@name='mapdata']/entry")->getValue();
if ($this->getAttribute('name') === 'CanonTimeInfo') dump($this->getAttribute('name'), 'fetch', MediaProbe::dumpHexFormatted($data_bytes));
        // Dump each tag at the position in the map specified by the item id.
        foreach ($this->getMultipleElements('*[not(self::rawData)]') as $sub_id => $sub) {
            $bytes_offset = $sub->getAttribute('id') * ItemFormat::getSize($this->getFormat());
//if ($this->getAttribute('name') === 'CanonCameraSettings') dump($sub_id, 'bytes_offset', $bytes_offset);
            $bytes = $sub->toBytes($byte_order);
//if ($this->getAttribute('name') === 'CanonCameraSettings') dump($sub_id, 'bytes', MediaProbe::dumpHexFormatted($bytes));
            $bytes_length = strlen($bytes);

            $tmp = substr($data_bytes, 0, $bytes_offset);
//if ($this->getAttribute('name') === 'CanonCameraSettings') dump($sub_id, 'tmp_1', MediaProbe::dumpHexFormatted($tmp));
            $tmp .= $bytes;
            $tmp .= substr($data_bytes, $bytes_offset + $bytes_length);
//if ($this->getAttribute('name') === 'CanonCameraSettings') dump($sub_id, 'tmp_3', MediaProbe::dumpHexFormatted($tmp));

            $data_bytes = $tmp;
        }
if ($this->getAttribute('name') === 'CanonTimeInfo') dump($this->getAttribute('name'), 'save', MediaProbe::dumpHexFormatted($data_bytes));

        return $data_bytes;
    }

    /**
     * @todo not quite right??
     */
    public function getComponents()
    {
        return $this->getDefinition()->getValuesCount();
    }
}
