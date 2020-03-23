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
    public function loadFromData(DataElement $data_element, int $offset = 0, $size = null): void
    {
        $data_window = $this->getDataWindow($data_element, $offset, $size);

        if ($data_window) {
            new Undefined($this, [$data_window->getBytes()]);
        }

        $this->valid = true;
    }
}
