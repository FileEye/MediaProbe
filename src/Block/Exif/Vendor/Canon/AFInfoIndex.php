<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataFormat;
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
        $this->components = $this->getDefinition()->getValuesCount();
        assert($this->debugInfo(['dataElement' => $data]));

        for ($i = 0; $i < $this->components; $i++) {
            $item_definition = $this->getItemDefinitionFromData($i, $i, $data, $offset);

            // Check if this tag should be skipped.
            if ($item_definition->getCollection()->getPropertyValue('skip')) {
                $this->debug("Skipped");
                continue;
            };

            if (in_array($item_definition->getCollection()->getPropertyValue('name'), ['AFAreaWidths', 'AFAreaHeights', 'AFAreaXPositions', 'AFAreaYPositions'])) {
                $value_components = $this->getElement("tag[@name='NumAFPoints']")->getElement("entry")->getValue();
                $this->components -= ($value_components - 1);
            } elseif (in_array($item_definition->getCollection()->getPropertyValue('name'), ['AFPointsInFocus', 'AFPointsSelected'])) {
                $value_components = (int) (($this->getElement("tag[@name='NumAFPoints']")->getElement("entry")->getValue() + 15) / 16);
                $this->components -= ($value_components - 1);
            } else {
                $value_components = 1;
            }

            // Adds the 'tag'.
            $item_class = $item_definition->getCollection()->getPropertyValue('handler');
            $item = new $item_class($item_definition, $this);

            $entry_class = $item_definition->getEntryClass();
            new $entry_class($item, $this->getDataWindowFromData($data, $offset, $item_definition->getFormat(), $value_components));
        }
    }
}
