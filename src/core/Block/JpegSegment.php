<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Entry\Core\Undefined;

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
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        $this->components = $size;

        if ($size) {
            $data_window = new DataWindow($data_element, $offset, $size, $data_element->getByteOrder());
            $data_window->debug($this);
            $entry = new Undefined($this, [$data_window->getBytes()]);
            $entry->debug("{text}", ['text' => $entry->toString()]);
        }

        return $this;
    }
}
