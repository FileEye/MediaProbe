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
    public function parseData(DataElement $data_element, int $start = 0, ?int $size = null): void
    {
        $segment_data = new DataWindow($data_element, $start, $size);
        $this->debugBlockInfo($segment_data);

        // Adds the segment data as an Undefined entry.
        new Undefined($this, [$segment_data->getBytes()]);
        $this->valid = true;
    }
}
