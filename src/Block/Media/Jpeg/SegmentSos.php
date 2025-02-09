<?php

namespace FileEye\MediaProbe\Block\Media\Jpeg;

use FileEye\MediaProbe\Block\Media\Jpeg;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;

/**
 * Class representing a JPEG SOS segment.
 */
class SegmentSos extends SegmentBase
{
    /**
     * JPEG EOI marker.
     */
    const JPEG_EOI = 0xD9;

    public function fromDataElement(DataElement $dataElement): static
    {
        assert($this->debugInfo(['dataElement' => $dataElement]));

        // This segment is last before End Of Image, and its length needs to be determined by
        // finding the EOI marker backwards from the end of data. Some images have some trailing
        // (garbage?) following the EOI marker, which we store in a RawData object.
        $scan_size = $dataElement->getSize();
        while ($dataElement->getByte($scan_size - 2) !== Jpeg::JPEG_DELIMITER || $dataElement->getByte($scan_size - 1) != static::JPEG_EOI) {
            $scan_size --;
        }
        $scan_size -= 2;
        $this->size = $scan_size;

        // Load data in an Undefined entry.
        new Undefined($this, new DataWindow($dataElement, 0, $this->size));

        return $this;
    }

    public function getParentElement(): Jpeg
    {
        return parent::getParentElement();
    }
}
