<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Map;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
    protected function validate(DataElement $data_element): void
    {
        parent::validate($data_element);

        // Find the appropriate map collection.
        foreach ($this->getCollection()->listItemIds() as $color_data_map) {
            $map_t = $this->getCollection()->getItemCollection($color_data_map);
            if (in_array($this->getDefinition()->getValuesCount(), $map_t->getPropertyValue('condition') ?? [])) {
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
