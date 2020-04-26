<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a JPEG APP1 segment.
 */
class JpegSegmentApp1 extends JpegSegmentBase
{
    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

        // If we have an Exif table, parse it.
        if (Exif::isExifSegment($data_element, 4)) {
            $this->addItem('Exif')->parseData(new DataWindow($data_element, 4, $data_element->getSize() - 4));
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Exif data.
            $entry = new Undefined($this, [$data_element->getBytes()]);
            $entry->debug("Not an Exif segment. Parsed {text}", ['text' => $entry->toString()]);
        }

        $this->valid = true;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        // If we have an Exif table, dump it.
        if ($exif = $this->getElement("exif")) {
            $data = $exif->toBytes();
            return chr(Jpeg::JPEG_DELIMITER) . chr($this->getAttribute('id')) . ConvertBytes::fromShort(strlen($data) + 2, ConvertBytes::BIG_ENDIAN) . $data;
        }

        // Fallback if no Exif data.
        return parent::toBytes();
    }
}
