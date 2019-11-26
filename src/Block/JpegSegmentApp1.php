<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a JPEG APP1 segment.
 */
class JpegSegmentApp1 extends JpegSegmentBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        $data_window = $this->getDataWindow($data_element, $offset, $size);

        if (Exif::isExifSegment($data_window, 2)) {
            $exif_collection = $this->getCollection()->getItemCollection('Exif');
            $exif_class = $exif_collection->getPropertyValue('class');
            $exif = new $exif_class($exif_collection, $this);
            $exif->loadFromData($data_window, 2, $this->components - 2);
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Exif data.
            $entry = new Undefined($this, [$data_window->getBytes()]);
            $entry->debug("Exif header not found. Loaded {text}", ['text' => $entry->toString()]);
        }

        $this->valid = true;
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
