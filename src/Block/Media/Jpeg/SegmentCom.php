<?php

namespace FileEye\MediaProbe\Block\Media\Jpeg;

use FileEye\MediaProbe\Block\Media\Jpeg;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Char;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a JPEG comment segment.
 */
class SegmentCom extends SegmentBase
{
    public function fromDataElement(DataElement $dataElement): static
    {
        $this->size = $dataElement->getSize();
        assert($this->debugInfo(['dataElement' => $dataElement]));
        // Adds the segment data as a Char string.
        new Char($this, new DataWindow($dataElement, 4));
        return $this;
    }

    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0): string
    {
        $data = $this->getElement("entry")->toBytes();
        return chr(Jpeg::JPEG_DELIMITER) . chr($this->getAttribute('id')) . ConvertBytes::fromShort(strlen($data) + 2, ConvertBytes::BIG_ENDIAN) . $data;
    }
}
