<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\Utility\ConvertBytes;

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