<?php

namespace FileEye\ImageInfo\core\Block;

use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\Entry\Core\Ascii;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

/**
 * Class representing a JPEG comment segment.
 */
class JpegSegmentCom extends JpegSegmentBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        $data_window = $this->getDataWindow($data_element, $offset, $size);

        // Set the Comments's entry.
        $entry = new Ascii($this, [$data_window->getBytes(2, $this->components - 2)]);

        $this->valid = true;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        $bytes = $this->getMarkerBytes();

        // Get the payload.
        $comment = $this->getElement("entry");
        $data = rtrim($comment->toBytes(), "\0");

        // Add the data lenght, include the two bytes of the length itself.
        $bytes .= ConvertBytes::fromShort(strlen($data) + 2, ConvertBytes::BIG_ENDIAN);

        // Add the data.
        $bytes .= $data;

        return $bytes;
    }
}
