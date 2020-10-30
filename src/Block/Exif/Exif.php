<?php

namespace FileEye\MediaProbe\Block\Exif;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element, int $start = 0, ?int $size = null): void
    {
        $exif_data = new DataWindow($data_element, $start, $size);

        $this->debugBlockInfo($exif_data);

        if (Tiff::getTiffSegmentByteOrder($exif_data, strlen(self::EXIF_HEADER)) !== null) {
            $this
                ->addItem('Tiff')
                ->parseData($exif_data, strlen(self::EXIF_HEADER), $exif_data->getSize() - strlen(self::EXIF_HEADER));
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Tiff data.
            $entry = new Undefined($this, [$exif_data->getBytes()]);
            $this->error("TIFF header not found. Parsed {text}", ['text' => $entry->toString()]);
        }

        $this->parsed = true;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        return self::EXIF_HEADER . $this->getElement('*')->toBytes();
    }

    /**
     * Determines if the data is an EXIF segment.
     */
    public static function isExifSegment(DataElement $data_element, $offset = 0)
    {
        // There must be at least 6 bytes for the Exif header.
        if ($data_element->getSize() - $offset < strlen(self::EXIF_HEADER)) {
            return false;
        }

        // Verify the Exif header.
        if ($data_element->getBytes($offset, strlen(self::EXIF_HEADER)) === self::EXIF_HEADER) {
            return true;
        }

        return false;
    }
}
