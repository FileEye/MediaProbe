<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Model\EntryInterface;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * @todo xxx
 */
class CustomFunctions2 extends ListBase
{
    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));

        $rec_pos = 0;
        for ($n = 0; $n < $this->getDefinition()->getValuesCount(); $n++) {
            $id = $data->getLong($rec_pos);
            $num = $data->getLong($rec_pos + 4);
            $this->debug("#{seq}, tag {id}/{hexid}, f {format}, c {components}, data @{offset}, size {size}", [
                'seq' => $n + 1,
                'id' => $id,
                'hexid' => '0x' . strtoupper(dechex($id)),
                'format' => DataFormat::getName(DataFormat::SIGNED_LONG),
                'components' => $num,
                'offset' => $data->getStart() + $rec_pos + 8,
                'size' => $num * 4,
            ]);
            $rec_pos += 8;
            try {
                $item_collection = $this->getCollection()->getItemCollection(
                    $id,
                    null,
                    'UnknownTag',
                    ['item' => $id, 'DOMNode' => 'tag'],
                    $num,
                    $this->getRootElement()
                );
                $item_definition = new ItemDefinition($item_collection, DataFormat::SIGNED_LONG, $num, $rec_pos);
                $class = $item_definition->getCollection()->getPropertyValue('class');
                $tag = new $class($item_definition, $this);
                $tag_data_window = new DataWindow($data, $item_definition->getDataOffset(), $item_definition->getSize());
                $tag->parseData($tag_data_window);
            } catch (DataException $e) {
                $tag->error($e->getMessage());
            }
            $rec_pos += ($num * 4);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
    {
        $bytes = '';

        // Fill in the TAG entries.
        foreach ($this->getMultipleElements('*') as $element) {
            // Tag ID.
            $bytes .= ConvertBytes::fromLong($element->getAttribute('id'), $byte_order);
            // Number of value items for the tag.
            $bytes .= ConvertBytes::fromLong($element->getComponents(), $byte_order);
            // The value(s) themselves.
            $bytes .= $element->toBytes($byte_order);
        }

        return $bytes;
    }
}
