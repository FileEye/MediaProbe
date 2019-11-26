<?php

namespace FileEye\MediaProbe\Block\MakerNotes\Canon;

use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Block\Map;
use FileEye\MediaProbe\Data\DataElement;
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
    protected function validate(DataElement $data_element, int $offset, int $size): void
    {
        parent::validate($data_element, $offset, $size);

        // Find the appropriate map collection.
        foreach ($this->getCollection()->listItemIds() as $color_data_map) {
            $map_t = $this->getCollection()->getItemCollection($color_data_map);
            if (in_array($this->getDefinition()->getValuesCount(), $map_t->getPropertyValue('condition') ?? [])) {
                $this->collection = $map_t;
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
