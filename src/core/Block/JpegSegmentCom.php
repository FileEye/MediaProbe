<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing a JPEG comment segment.
 */
class JpegSegmentCom extends JpegSegmentBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, $size = null, array $options = [])
    {
        parent::loadFromData($data_window, $offset, $size, $options);

        $this->components = $size;

        // Set the Comments's entry.
        $entry = new Ascii($this, [$data_window->getBytes($offset + 2, $this->components - 2)]);
        $entry->debug("Text: {text}", [
            'text' => $entry->toString(),
        ]);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        $bytes = $this->getMarkerBytes();

        // Get the payload.
        $comment = $this->getElement("entry");
        $data = $comment->toBytes();

        // Add the data lenght, include the two bytes of the length itself.
        $bytes .= ConvertBytes::fromShort(strlen($data) + 2, ConvertBytes::BIG_ENDIAN);

        // Add the data.
        $bytes .= $data;

        return $bytes;
    }
}
