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
    protected function validate(DataElement $data_element, int $offset, int $size): void
    {
        parent::validate($data_element, $offset, $size);

        // Load the map as a raw data block.
        $map = new RawData(Collection::get('RawData', ['name' => 'mapdata']), $this);
        $map_data_window = new DataWindow($data_element, $offset, $size);
        $map_data_window->logInfo($map->getLogger());
        $map->loadFromData($map_data_window, 0, $map_data_window->getSize());
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        $this->validate($data_element, $offset, $size);

        $i = 0;
        foreach ($this->getCollection()->listItemIds() as $item) {

            // Adds the 'tag'.
            try {
                $n = $offset + ($item * ItemFormat::getSize($this->getFormat()));

                // todo xx manage better the out-of-bounds
                if ($n > $offset + $size - 1) {
                    throw new DataException("Offset $n out of bounds");
                }

                $item_definition = $this->getItemDefinitionFromData($i, $item, $data_element, $n);

                $value = $this->getValueFromData($data_element, $n, $item_definition->getFormat(), $item_definition->getValuesCount());
                $tag = new Tag($item_definition, $this);
                $entry_class = $item_definition->getEntryClass();
                new $entry_class($tag, $value);
                $tag->valid = true;
            }
            catch (DataException $e) {
                $this->notice($e->getMessage());
            }

            $i++;
        }

        $this->valid = true;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $data_bytes = $this->getElement("rawData[@name='mapdata']/entry")->getValue();

        // Dump each tag at the position in the map specified by the item id.
        foreach ($this->getMultipleElements('*[not(self::rawData)]') as $sub_id => $sub) {
            $bytes_offset = $sub_id * 2;
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
