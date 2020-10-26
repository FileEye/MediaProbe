<?php

namespace FileEye\MediaProbe\Block\MakerNotes\Canon;

use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Map;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
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
    protected function validate(DataElement $data_element): void
    {
    }
}
