<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing a JPEG APP1 segment.
 */
class JpegSegmentApp1 extends JpegSegmentBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        $data_window = new DataWindow($data_element, $offset, $size, $data_element->getByteOrder());
        $data_window->debug($this);

        $this->components = $size;

        if (Exif::isExifSegment($data_window, 2)) {
            $exif = new Exif('exif', $this);
            $exif->loadFromData($data_window, 2, $this->components - 2);
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Exif data.
            $entry = new Undefined($this, [$data_window->getBytes()]);
            $entry->debug("Exif header not found. Loaded {text}", ['text' => $entry->toString()]);
        }

        $this->debug(".....END Loading");

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        if ($exif = $this->getElement("exif")) {
            $bytes = $this->getMarkerBytes();

            // Get the payload.
            $data = $exif->toBytes();

            // Add the data lenght, include the two bytes of the length itself.
            $bytes .= ConvertBytes::fromShort(strlen($data) + 2, ConvertBytes::BIG_ENDIAN);

            // Add the data.
            $bytes .= $data;

            return $bytes;
        }

        return parent::toBytes();
    }
}
