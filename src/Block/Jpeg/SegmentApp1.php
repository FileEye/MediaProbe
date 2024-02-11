<?php

namespace FileEye\MediaProbe\Block\Jpeg;

use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a JPEG APP1 segment.
 */
class SegmentApp1 extends SegmentBase
{
    /**
     * {@inheritdoc}
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0): string
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
