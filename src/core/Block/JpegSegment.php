<?php

namespace FileEye\ImageInfo\core\Block;

use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\Entry\Core\Undefined;

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
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        $data_window = $this->getDataWindow($data_element, $offset, $size);

        if ($data_window) {
            new Undefined($this, [$data_window->getBytes()]);
        }

        $this->valid = true;
        return $this;
    }
}
