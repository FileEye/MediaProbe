<?php

namespace FileEye\MediaProbe\Parser\Jpeg;

use FileEye\MediaProbe\Block\Jpeg\Exif as ExifBlock;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Parser\ParserBase;

/**
 * Class for parsing Exif data.
 *
 * This is found in a JPEG APP1 segment, and it is just an header for an entire
 * TIFF structure.
 */
class Exif extends ParserBase
{
    public function parseData(DataElement $data): void
    {
        assert($this->block->debugInfo(['dataElement' => $data]));

        $tiff = new ItemDefinition(
            collection: CollectionFactory::get('Tiff\Tiff'),
        );
        $tiffParser = $tiff->collection->getPropertyValue('parser');

        if ($tiffParser::getTiffSegmentByteOrder($data, strlen(ExifBlock::EXIF_HEADER)) !== null) {
            $this->block->addBlock($tiff)->parseData($data, strlen(ExifBlock::EXIF_HEADER), $data->getSize() - strlen(ExifBlock::EXIF_HEADER));
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Tiff data.
            $entry = new Undefined($this->block, [$data->getBytes()]);
            $this->block->error("TIFF header not found. Parsed {text}", ['text' => $entry->toString()]);
        }
    }

    /**
     * Determines if the data is an EXIF segment.
     */
    public static function isExifSegment(DataElement $dataElement, $offset = 0): bool
    {
        // There must be at least 6 bytes for the Exif header.
        if ($dataElement->getSize() - $offset < strlen(ExifBlock::EXIF_HEADER)) {
            return false;
        }

        // Verify the Exif header.
        if ($dataElement->getBytes($offset, strlen(ExifBlock::EXIF_HEADER)) === ExifBlock::EXIF_HEADER) {
            return true;
        }

        return false;
    }
}
