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
    public function parseData(DataElement $data_element, int $start = 0, ?int $size = null): void
    {
//dump('data element', $data_element->getAbsoluteOffset(), $start, $size, MediaProbe::dumpHexFormatted($data_element->getBytes(0, min(100, $size))));
        $map_data = new DataWindow($data_element, $start, $size);
//dump('map data', $map_data->getAbsoluteOffset(), MediaProbe::dumpHexFormatted($map_data->getBytes()));
        $this->debugBlockInfo($map_data);

        $this->validate($map_data);

        // Preserve the entire map as a raw data block.
        $this
            ->addItemWithDefinition(new ItemDefinition(Collection::get('RawData', ['name' => 'mapdata']), ItemFormat::BYTE))
            ->parseData($map_data, 0, $size);

        $i = 0;
        $offset = 0;
        $size = $this->getDefinition()->getSize();
        foreach ($this->getCollection()->listItemIds() as $item) {
            // Adds a 'tag'.
            try {
                $n = $offset + ($item * ItemFormat::getSize($this->getFormat()));

                // todo xx manage better the out-of-bounds
                if ($n > $offset + $size - 1) {
                    throw new DataException("Offset $n out of bounds");
                }

                $item_definition = $this->getItemDefinitionFromData($i, $item, $map_data, $n);
                $item_class = $item_definition->getCollection()->getPropertyValue('class');
                $item = new $item_class($item_definition, $this);
                $item->parseData($map_data, $item_definition->getDataOffset(), $item_definition->getSize());
            } catch (DataException $e) {
                $this->notice($e->getMessage());
            }

            $i++;
        }

        $this->valid = true;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($map_data);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $data_bytes = $this->getElement("rawData[@name='mapdata']/entry")->getValue();

        // Dump each tag at the position in the map specified by the item id.
        foreach ($this->getMultipleElements('*[not(self::rawData)]') as $sub_id => $sub) {
            $bytes_offset = $sub->getAttribute('id') * ItemFormat::getSize($this->getFormat());
            $bytes = $sub->toBytes($byte_order);
            $bytes_length = strlen($bytes);

            $tmp = substr($data_bytes, 0, $bytes_offset);
            $tmp .= $bytes;
            $tmp .= substr($data_bytes, $bytes_offset + $bytes_length);

            $data_bytes = $tmp;
        }

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
