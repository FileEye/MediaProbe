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
    protected function doParseData(DataElement $data): void
    {
        // Adds the segment data as an Ascii entry.
        new Ascii($this, new DataWindow($data, 4));
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        $data = rtrim($this->getElement("entry")->toBytes(), "\0");
        return chr(Jpeg::JPEG_DELIMITER) . chr($this->getAttribute('id')) . ConvertBytes::fromShort(strlen($data) + 2, ConvertBytes::BIG_ENDIAN) . $data;
    }
}
