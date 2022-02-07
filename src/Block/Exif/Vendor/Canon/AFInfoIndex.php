<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing an index of values, for Canon AFInfo e AFInfo2.
 */
class AFInfoIndex extends Index
{
    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        $this->validate($data);

        // Loops through the index and loads the tags. If the 'hasIndexSize'
        // property is true, the first entry is a special case that is handled
        // by opening a 'rawData' node instead of a 'tag'.
        $offset = 0;
        $index_components = $this->getDefinition()->getValuesCount();
        for ($i = 0; $i < $index_components; $i++) {
            $item_definition = $this->getItemDefinitionFromData($i, $i, $data, $offset);

            // Check if this tag should be skipped.
            if ($item_definition->getCollection()->getPropertyValue('skip')) {
                $this->debug("Skipped");
                continue;
            };

            if (in_array($item_definition->getCollection()->getPropertyValue('name'), ['AFAreaWidths', 'AFAreaHeights', 'AFAreaXPositions', 'AFAreaYPositions'])) {
                $value_components = $this->getElement("tag[@name='NumAFPoints']")->getElement("entry")->getValue();
                $index_components -= ($value_components - 1);
            } elseif (in_array($item_definition->getCollection()->getPropertyValue('name'), ['AFPointsInFocus', 'AFPointsSelected'])) {
                $value_components = (int) (($this->getElement("tag[@name='NumAFPoints']")->getElement("entry")->getValue() + 15) / 16);
                $index_components -= ($value_components - 1);
            } else {
                $value_components = 1;
            }

            // Adds the 'tag'.
            $item_class = $item_definition->getCollection()->getPropertyValue('class');
            $item = new $item_class($item_definition, $this);

            $entry_class = $item_definition->getEntryClass();
            new $entry_class($item, $this->getDataWindowFromData($data, $offset, $item_definition->getFormat(), $value_components));
        }
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
