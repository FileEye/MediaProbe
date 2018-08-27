<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing a JPEG SOS segment.
 */
class JpegSegmentSos extends JpegSegmentBase
{
    /**
     * JPEG EOI marker.
     */
    const JPEG_EOI = 0xD9;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        // This segment is last before End Of Image, and its length needs to be
        // determined by finding the EOI marker backwards from the end of data.
        // Some images have some trailing (garbage?) following the EOI marker,
        // which we store in a RawData object.
        $size = $data_window->getSize();
        $length = $size;
        while ($data_window->getByte($length - 2) !== JpegSegment::JPEG_DELIMITER || $data_window->getByte($length - 1) != self::JPEG_EOI) {
            $length --;
        }
        $this->components = $length - $offset - 2;

        // Load data in an Undefined entry.
        $entry = new Undefined($this, [$data_window->getBytes($offset, $this->components)]);
        $entry->debug("Scan: {text}", ['text' => $entry->toString()]);

        // Append the EOI.
        new JpegSegment(self::JPEG_EOI, $this->getParentElement());

        // Now check to see if there are any trailing data.
        $end_offset = $offset + $this->components + 2;
        if ($end_offset < $size) {
            $raw_components = $size - $end_offset;
            $this->warning('Found trailing content after EOI: {size} bytes', ['size' => $raw_components]);
            // There is no JPEG marker for trailing garbage, so we just load
            // the data in a RawData object.
            $trail = new RawData($this->getParentElement());
            $trail->loadFromData($data_window, $end_offset, ['components' => $raw_components]);
        }

        return $this;
    }
}
