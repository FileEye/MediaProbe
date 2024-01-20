<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Data\DataFormat;
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
    protected int $format;

    /**
     * {@inheritdoc}
     */
    public function __construct(ItemDefinition $definition, BlockBase $parent = null, BlockBase $reference = null)
    {
        parent::__construct($definition, $parent, $reference);
        $this->components = $definition->getValuesCount();
        $this->format = $definition->getFormat();
    }

    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        $this->validate($data);
        assert($this->debugInfo(['dataElement' => $data]));

        // Preserve the entire map as a raw data block.
        $mapdata = new ItemDefinition(CollectionFactory::get('RawData', ['name' => 'mapdata']));
        $this->addBlock($mapdata)->parseData($data);

        // Build the map items.
        $i = 0;
        foreach ($this->getCollection()->listItemIds() as $item) {
            $n = $item * DataFormat::getSize($this->getFormat());
            $item_definition = $this->getItemDefinitionFromData($i, $item, $data, $n);

            // Check data is accessible, warn otherwise.
            if ($item_definition->getDataOffset() >= $data->getSize()) {
                $this->warning(
                    'Could not access value for item \'{item}\' in \'{map}\', overflow',
                    [
                        'item' => $item_definition->getCollection()->getPropertyValue('name'),
                        'map' => $this->getAttribute('name'),
                    ]
                );
                continue;
            }
            if ($item_definition->getDataOffset() +  $item_definition->getSize() > $data->getSize()) {
                $this->warning(
                    'Could not get value for item \'{item}\' in \'{map}\', not enough data',
                    [
                        'item' => $item_definition->getCollection()->getPropertyValue('name'),
                        'map' => $this->getAttribute('name'),
                    ]
                );
                continue;
            }

            // Adds the item to the DOM.
            $item = $this->addBlock($item_definition);
            try {
                $item->parseData($data, $item_definition->getDataOffset(), $item_definition->getSize());
            } catch (DataException $e) {
                $item->error($e->getMessage());
                $item->valid = false;
            }

            $i++;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat(): int
    {
        return $this->format;
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents(): int
    {
        return $this->components;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
    {
        $mapDataElement = $this->getElement("rawData[@name='mapdata']/entry");
        if ($mapDataElement === null) {
            return '';
        }
        $mapDataBytes = $mapDataElement->toBytes();

        // Dump each tag at the position in the map specified by the item id.
        foreach ($this->getMultipleElements('*[not(self::rawData)]') as $sub_id => $sub) {
            $bytes_offset = $sub->getAttribute('id') * DataFormat::getSize($this->getFormat());
            $bytes = $sub->toBytes($byte_order);
            $bytes_length = strlen($bytes);

            $tmp = substr($mapDataBytes, 0, $bytes_offset);
            $tmp .= $bytes;
            $tmp .= substr($mapDataBytes, $bytes_offset + $bytes_length);

            $mapDataBytes = $tmp;
        }

        return $mapDataBytes;
    }
}
