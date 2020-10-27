<?php

namespace FileEye\MediaProbe\Block\MakerNotes\Canon;

use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Map;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing an index of values, for Canon Filter information.
 *
 * The actual map collection need to be resolved.
 */
class FilterInfoIndex extends Index
{
    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

//        $this->validate($data_element);

        $offset = 0;
        $index_components = $data_element->getLong($offset + 4);
        $this->debug("Components: $index_components");
        $offset += 8;
        for ($i = 0; $i < $index_components; $i++) {
            $filter_number = $data_element->getLong($offset);
            $filter_size = $data_element->getLong($offset + 4);
            $filter_param_count = $data_element->getLong($offset + 8);
            $this->debug("Filter: $filter_number $filter_size $filter_param_count");
            $next = $offset + 4 + $filter_size;
            $offset += 12;
            for ($p = 0; $p < $filter_param_count; $p++) {
                $id = $data_element->getLong($offset);
                $count = $data_element->getLong($offset + 4);
                $offset += 8;
                $val = $data_element->getSignedLong($offset);
                $this->debug("Tag: $id $count $val");
                $offset += 4 * $count;
            }
/*            // Adds the 'tag'.
            $item_class = $item_definition->getCollection()->getPropertyValue('class');
            $item = new $item_class($item_definition, $this);

            $entry_class = $item_definition->getEntryClass();
            new $entry_class($item, $this->getValueFromData($data_element, $offset, $item_definition->getFormat(), $value_components));
            $item->valid = true;*/
            $offset = $next;
        }

        $this->valid = true;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);
    }

    /**
     * {@inheritdoc}
     */
    public function debugBlockInfo(?DataElement $data_element = null, int $items_count = 0)
    {
        $msg = '#{seq} {node}:{name}';
        $seq = $this->getDefinition()->getSequence() + 1;
        if ($this->getParentElement() && ($parent_name = $this->getParentElement()->getAttribute('name'))) {
            $seq = $parent_name . '.' . $seq;
        }
        $node = $this->DOMNode->nodeName;
        $name = $this->getAttribute('name');
        $item = $this->getAttribute('id');
        if ($item ==! null) {
            $msg .= ' ({item})';
        }
        if (is_numeric($item)) {
            $item = $item . '/0x' . strtoupper(dechex($item));
        }
        if ($data_element instanceof DataWindow) {
            $msg .= ' @{offset}, {tags} entries, f {format}, s {size}';
            $offset = $data_element->getAbsoluteOffset() . '/0x' . strtoupper(dechex($data_element->getAbsoluteOffset()));
        } else {
            $msg .= ' {tags} entries, format ?xxx, size {size}';
        }
        $this->debug($msg, [
            'seq' => $seq,
            'node' => $node,
            'name' => $name,
            'item' => $item,
            'offset' => $offset ?? null,
            'tags' => $this->getDefinition()->getValuesCount(),
            'format' => ItemFormat::getName($this->getDefinition()->getFormat()),
            'size' => $this->getDefinition()->getSize(),
        ]);
    }
}
