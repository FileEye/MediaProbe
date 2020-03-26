<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;

/**
 * Class representing a generic JPEG data segment.
 *
 * This is the default segment processor in case no specific class are defined.
 */
class JpegSegment extends JpegSegmentBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

        // Adds the segment data as an Undefined entry.
        new Undefined($this, [$data_element->getBytes()]);

        $this->valid = true;
    }
}
