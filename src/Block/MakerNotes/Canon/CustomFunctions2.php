<?php

namespace FileEye\MediaProbe\Block\MakerNotes\Canon;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
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
    public function parseData(DataElement $data_element, int $offset = 0): void
    {
        $valid = true;

        $rec_pos = $offset;
        for ($n = 0; $n < $this->getDefinition()->getValuesCount(); $n++) {
            $id = $data_element->getLong($rec_pos);
            $num = $data_element->getLong($rec_pos + 4);
            $this->debug("#{seq}, tag {id}/{hexid}, f {format}, c {components}, data @{offset}, size {size}", [
                'seq' => $n + 1,
                'id' => $id,
                'hexid' => '0x' . strtoupper(dechex($id)),
                'format' => ItemFormat::getName(ItemFormat::SIGNED_LONG),
                'components' => $num,
                'offset' => $data_element->getStart() + $rec_pos + 8,
                'size' => $num * 4,
            ]);
            $rec_pos += 8;
            try {
                $item_collection = $this->getCollection()->getItemCollection($id, 'UnknownTag', [
                    'item' => $id,
                    'DOMNode' => 'tag',
                ]);
                $item_definition = new ItemDefinition($item_collection, ItemFormat::SIGNED_LONG, $num, $rec_pos);
                $class = $item_definition->getCollection()->getPropertyValue('class');
                $tag = new $class($item_definition, $this);
                $tag_data_window = new DataWindow($data_element, $item_definition->getDataOffset(), $item_definition->getSize());
                $tag->parseData($tag_data_window);
            } catch (DataException $e) {
                $tag->error($e->getMessage());
                $valid = false;
            }
            $rec_pos += ($num * 4);
        }

        $this->valid = $valid;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
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
