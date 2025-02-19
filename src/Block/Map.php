<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\BlockBase;
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
    public function __construct(
        ItemDefinition $definition,
        ?BlockBase $parent = null,
        ?BlockBase $reference = null,
    ) {
        parent::__construct($definition, $parent, $reference);
        $this->components = $definition->valuesCount;
        $this->format = $definition->format;
    }

    protected function doParseData(DataElement $data): void
    {
        $this->validate($data);
        assert($this->debugInfo(['dataElement' => $data]));

        // Preserve the entire map as a raw data block.
        $mapdata = new ItemDefinition(CollectionFactory::get('RawData', ['name' => 'mapdata']));
        $mapdataBlock = $this->addBlock($mapdata);
        assert($mapdataBlock instanceof RawData);
        $mapdataBlock->parseData($data);

        // Build the map items.
        $i = 0;
        foreach ($this->getCollection()->listItemIds() as $item) {
            $n = $item * DataFormat::getSize($this->getFormat());
            $item_definition = $this->getItemDefinitionFromData($i, $item, $data, $n);

            // Check data is accessible, notice otherwise.
            if ($item_definition->dataOffset >= $data->getSize()) {
                $this->debug(
                    '\'{item}\' in map \'{map}\' is beyond end of data available, skipped',
                    [
                        'item' => $item_definition->collection->getPropertyValue('name'),
                        'map' => $this->getAttribute('name'),
                    ]
                );
                continue;
            }
            if ($item_definition->dataOffset +  $item_definition->getSize() > $data->getSize()) {
                $this->warning(
                    'Failed to get value for \'{item}\' in map \'{map}\', not enough data left',
                    [
                        'item' => $item_definition->collection->getPropertyValue('name'),
                        'map' => $this->getAttribute('name'),
                    ]
                );
                continue;
            }

            // Adds the item to the DOM.
            $item = $this->addBlock($item_definition);
            assert($item instanceof Tag || $item instanceof RawData, get_class($item));
            try {
                if (is_a($item, Tag::class, true)) {
                    $item_data_window_offset = $item->ifdEntry->isOffset ? $item->ifdEntry->dataOffset() : $item->ifdEntry->dataValue();
                    $item_data_window_size = $item->ifdEntry->countOfComponents > 0 ? $item->ifdEntry->size : 4;
                    $tagDataWindow = new DataWindow($data, $item_data_window_offset, $item_data_window_size);
                    $item->fromDataElement($tagDataWindow);
                    $this->graftBlock($item);
                } else {
                    $item->parseData($data, $item_definition->dataOffset, $item_definition->getSize());
                }
            } catch (DataException $e) {
                $item->error($e->getMessage());
            }

            $i++;
        }
    }

    public function getFormat(): int
    {
        return $this->format;
    }

    public function getComponents(): int
    {
        return $this->components;
    }

    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
    {
        $mapDataElement = $this->getElement("rawData[@name='mapdata']/entry");
        if ($mapDataElement === null) {
            return '';
        }
        $mapDataBytes = $mapDataElement->toBytes();

        // Dump each tag at the position in the map specified by the item id.
        foreach ($this->getMultipleElements('*[not(self::rawData)]') as $sub_id => $sub) {
            $bytes_offset = ((int) $sub->getAttribute('id')) * DataFormat::getSize($this->getFormat());
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
