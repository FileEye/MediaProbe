<?php

namespace FileEye\MediaProbe\Block\Jpeg;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a JPEG APP1 segment.
 */
class SegmentApp1 extends SegmentBase
{
    public function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));
        // If we have an Exif table, parse it.
        // @todo use parser and not class call driectly
        if (Exif::isExifSegment($data, 4)) {
            $exif = new ItemDefinition(CollectionFactory::get('Jpeg\Exif'));
            $this->addBlock($exif)->parseData($data, 4, $data->getSize() - 4);
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Exif data.
            $entry = new Undefined($this, $data);
            $entry->debug("Not an Exif segment. Parsed {text}", ['text' => $entry->toString()]);
        }
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
