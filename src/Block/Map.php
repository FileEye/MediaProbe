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
 * Class representing a map of values.
 *
 * This class is useful when you have a sparse table of data and want to access
 * it directly by offset.
 */
class Map extends Index
{
    /**
     * The format of map data.
     */
    protected $format;

    /**
     * The amount of components in the map.
     */
    protected $components;

    /**
     * {@inheritdoc}
     */
    public function __construct(ItemDefinition $definition, BlockBase $parent = null, BlockBase $reference = null)
    {
        parent::__construct($definition, $parent, $reference);
        $this->components = $definition->getValuesCount();
        $this->format = $definition->getFormat();
//dump($definition);
    }

    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        $this->validate($data);

        // Preserve the entire map as a raw data block.
        $mapdata = new ItemDefinition(Collection::get('RawData', ['name' => 'mapdata']));
        $this->addBlock($mapdata)->parseData($data);

        $i = 0;
        foreach ($this->getCollection()->listItemIds() as $item) {
            // Adds a 'tag'.
            try {
                $n = $item * ItemFormat::getSize($this->getFormat());
                $item_definition = $this->getItemDefinitionFromData($i, $item, $data, $n);
                $this->addBlock($item_definition)->parseData($data, $item_definition->getDataOffset(), $item_definition->getSize());
            } catch (DataException $e) {
                $this->notice($e->getMessage());
            }
            $i++;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $data_bytes = $this->getElement("rawData[@name='mapdata']/entry")->getValue();
//if ($this->getAttribute('name') === 'CanonFilterInfo') dump($offset, MediaProbe::dumpHexFormatted($data_element->getBytes($offset - 1024, 10000)));
//dump($this->getAttribute('name'), MediaProbe::dumpHexFormatted($data_bytes));

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
}
