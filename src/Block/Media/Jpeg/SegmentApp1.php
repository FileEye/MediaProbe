<?php

namespace FileEye\MediaProbe\Block\Media\Jpeg;

use FileEye\MediaProbe\Block\Media\Jpeg;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a JPEG APP1 segment.
 */
class SegmentApp1 extends SegmentBase
{
    public function fromDataElement(DataElement $dataElement): static
    {
        $this->size = $dataElement->getSize();
        assert($this->debugInfo(['dataElement' => $dataElement]));
        // If we have an Exif table, parse it.
        if (ExifApp::isExifSegment($dataElement, 4)) {
            $exifAppCollection = $this->collection->getItemCollection('ExifApp');
            $exifAppHandler = $exifAppCollection->getHandler();
            $exifBlock = new $exifAppHandler(
                collection: $exifAppCollection,
                parent: $this,
            );
            assert($exifBlock instanceof ExifApp);
            $exifBlock->fromDataElement(new DataWindow($dataElement, 4, $dataElement->getSize() - 4));
            $this->graftBlock($exifBlock);
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Exif data.
            $entry = new Undefined($this, $dataElement);
            $entry->debug("Not an Exif segment. Parsed {text}", ['text' => $entry->toString()]);
        }
        return $this;
    }

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
