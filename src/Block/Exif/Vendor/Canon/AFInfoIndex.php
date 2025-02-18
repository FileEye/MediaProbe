<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Media\Tiff\IfdEntryValueObject;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Data\DataElement;

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
        $this->components = $this->getDefinition()->valuesCount;
        assert($this->debugInfo(['dataElement' => $data]));

        for ($i = 0; $i < $this->components; $i++) {
            $item_definition = $this->getItemDefinitionFromData($i, $i, $data, $offset);

            // Check if this tag should be skipped.
            if ($item_definition->collection->getPropertyValue('skip')) {
                $this->debug("Skipped");
                continue;
            };

            if (in_array($item_definition->collection->getPropertyValue('name'), ['AFAreaWidths', 'AFAreaHeights', 'AFAreaXPositions', 'AFAreaYPositions'])) {
                $valueComponentsTag = $this->getElement("tag[@name='NumAFPoints']");
                assert($valueComponentsTag instanceof Tag);
                $valueComponents = $valueComponentsTag->getValue();
                $this->components -= ($valueComponents - 1);
            } elseif (in_array($item_definition->collection->getPropertyValue('name'), ['AFPointsInFocus', 'AFPointsSelected'])) {
                $valueComponentsTag = $this->getElement("tag[@name='NumAFPoints']");
                assert($valueComponentsTag instanceof Tag);
                $valueComponents = (int) (($valueComponentsTag->getValue() + 15) / 16);
                $this->components -= ($valueComponents - 1);
            } else {
                $valueComponents = 1;
            }

            // Adds the 'tag'.
            $item_class = $item_definition->collection->handler();
            if (is_a($item_class, Tag::class, true)) {
                $item = new $item_class(
                    ifdEntry: new IfdEntryValueObject(
                        collection: $item_definition->collection,
                        dataFormat: $item_definition->format,
                        countOfComponents: $item_definition->valuesCount,
                        data: $item_definition->dataOffset,
                        sequence: $item_definition->sequence,
                    ),
                    parent: $this,
                );
                $this->graftBlock($item);
            } else {
                $item = new $item_class($item_definition, $this);
            }

            $entry_class = $item_definition->getEntryClass();
            new $entry_class($item, $this->getDataWindowFromData($data, $offset, $item_definition->format, $valueComponents));
        }
    }
}
