<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\Map;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\ItemDefinition;

/**
 * Class representing a map of values, for Canon ColorData information.
 *
 * The actual map collection need to be resolved.
 */
class ColorDataMap extends Map
{
    /**
     * {@inheritdoc}
     */
    protected function validate(DataElement $dataElement): void
    {
        parent::validate($dataElement);

        // Find the appropriate map collection.
        foreach ($this->getCollection()->listItemIds() as $color_data_map) {
            $map_t = $this->getCollection()->getItemCollection($color_data_map);
            if (in_array($this->getDefinition()->valuesCount, $map_t->getPropertyValue('condition') ?? [])) {
                $this->definition = new ItemDefinition($map_t, $map_t->getPropertyValue('format')[0]);
                break;
            }
        }
        // todo xx unknown

        $this->debug("Resolved map to {domnode}:{name}", [
            'domnode' => $this->getCollection()->getPropertyValue('DOMNode'),
            'name' => $this->getCollection()->getPropertyValue('name'),
        ]);
    }
}
