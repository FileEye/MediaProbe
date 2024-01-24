<?php

namespace FileEye\MediaProbe\Block\Jpeg;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;

/**
 * Class representing a generic JPEG data segment.
 *
 * This is the default segment processor in case no specific class are defined.
 */
class Segment extends SegmentBase
{
    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));
        // Adds the segment data as an Undefined entry.
        new Undefined($this, $data);
    }
}
