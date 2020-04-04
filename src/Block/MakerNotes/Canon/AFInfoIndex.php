<?php

namespace FileEye\MediaProbe\Block\MakerNotes\Canon;

use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing an index of values, for Canon AFInfo e AFInfo2.
 */
class AFInfoIndex extends Index
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, int $offset = 0, $size = null): void
    {
        $this->validate($data_element, $offset, $size);

        // Loops through the index and loads the tags. If the 'hasIndexSize'
        // property is true, the first entry is a special case that is handled
        // by opening a 'rawData' node instead of a 'tag'.
        $o = $offset;
        $index_components = $this->getDefinition()->getValuesCount();
        for ($i = 0; $i < $index_components; $i++) {
            $item_definition = $this->getItemDefinitionFromData($i, $i, $data_element, $o);

            // Check if this tag should be skipped.
            if ($item_definition->getCollection()->getPropertyValue('skip')) {
                $this->debug("Skipped");
                continue;
            };

            if (in_array($item_definition->getCollection()->getPropertyValue('name'), ['AFAreaWidths', 'AFAreaHeights', 'AFAreaXPositions', 'AFAreaYPositions'])) {
                $value_components = $this->getElement("tag[@name='NumAFPoints']")->getElement("entry")->getValue();
                $index_components -= ($value_components - 1);
            }
            elseif (in_array($item_definition->getCollection()->getPropertyValue('name'), ['AFPointsInFocus', 'AFPointsSelected'])) {
                $value_components = (int) (($this->getElement("tag[@name='NumAFPoints']")->getElement("entry")->getValue() + 15) / 16);
                $index_components -= ($value_components - 1);
            }
            else {
                $value_components = 1;
            }

            // Adds the 'tag'.
            $tag = new Tag($item_definition, $this); // xx todo open a rawData object in case
            $entry_class = $item_definition->getEntryClass();
            new $entry_class($tag, $this->getValueFromData($data_element, $o, $item_definition->getFormat(), $value_components));
            $tag->valid = true;
        }

        $this->valid = true;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);
    }
}
