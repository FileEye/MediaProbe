<?php

namespace FileEye\MediaProbe\Block\Jpeg;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Utility\ConvertBytes;
use FileEye\MediaProbe\ItemDefinition;

/**
 * Class representing Exif data.
 *
 * This is found in a JPEG APP1 segment, and it is just an header for an entire
 * TIFF structure.
 */
class Exif extends BlockBase
{
    /**
     * Exif header.
     *
     * The Exif data must start with these six bytes to be considered valid.
     */
    // @todo xxx the trailing bytes may not be zeros
    const EXIF_HEADER = "Exif\0\0";

    /**
     * Determines if the data is an EXIF segment.
     */
    public static function isExifSegment(DataElement $dataElement, $offset = 0): bool
    {
        // There must be at least 6 bytes for the Exif header.
        if ($dataElement->getSize() - $offset < strlen(static::EXIF_HEADER)) {
            return false;
        }

        // Verify the Exif header.
        if ($dataElement->getBytes($offset, strlen(static::EXIF_HEADER)) === static::EXIF_HEADER) {
            return true;
        }

        return false;
    }

    public function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));

        $tiff = new ItemDefinition(
            collection: CollectionFactory::get('Tiff\Tiff'),
        );
        $tiffHandler = $tiff->collection->getPropertyValue('handler');

        if ($tiffHandler::getTiffSegmentByteOrder($data, strlen(static::EXIF_HEADER)) !== null) {
            $this->addBlock($tiff)->parseData($data, strlen(static::EXIF_HEADER), $data->getSize() - strlen(static::EXIF_HEADER));
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Tiff data.
            $entry = new Undefined($this, [$data->getBytes()]);
            $this->error("TIFF header not found. Parsed {text}", ['text' => $entry->toString()]);
        }
    }

    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0): string
    {
        return self::EXIF_HEADER . $this->getElement('*')->toBytes();
    }
}
