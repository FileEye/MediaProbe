<?php

namespace ExifEye\core\Block;

use ExifEye\core\Collection;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
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
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        // This segment is last before End Of Image, and its length needs to be
        // determined by finding the EOI marker backwards from the end of data.
        // Some images have some trailing (garbage?) following the EOI marker,
        // which we store in a RawData object.
        $size = $data_element->getSize();
        $length = $size;
        while ($data_element->getByte($length - 2) !== JpegSegment::JPEG_DELIMITER || $data_element->getByte($length - 1) != self::JPEG_EOI) {
            $length --;
        }
        $this->components = $length - $offset - 2;
        $end_offset = $offset + $this->components + 2;

        // Load data in an Undefined entry.
        $data_window = new DataWindow($data_element, $offset, $this->components, $data_element->getByteOrder());
        $data_window->logInfo($this->getLogger());
        new Undefined($this, [$data_window->getBytes()]);

        // Append the EOI.
        $eoi_collection = $this->getParentElement()->getCollection()->getItemCollection(self::JPEG_EOI);
        $eoi = new JpegSegment($eoi_collection, $this->getParentElement());
        $eoi->valid = true;

        // Now check to see if there are any trailing data.
        if ($end_offset < $size) {
            $raw_size = $size - $end_offset;
            $this->warning('Found trailing content after EOI: {size} bytes', ['size' => $raw_size]);
            // There is no JPEG marker for trailing garbage, so we just load
            // the data in a RawData object.
            $trail = new RawData($this->getParentElement());
            $trail_data_window = new DataWindow($data_element, $end_offset, $raw_size, $data_element->getByteOrder());
            $trail_data_window->logInfo($trail->getLogger());
            $trail->loadFromData($trail_data_window, 0, $raw_size);
        }

        $this->valid = true;
        return $this;
    }
}
