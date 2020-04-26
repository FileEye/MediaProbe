<?php

namespace FileEye\MediaProbe\Block;

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
    const EXIF_HEADER = "Exif\0\0";

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

        $tiff_order = Tiff::getTiffSegmentByteOrder($data_element, strlen(self::EXIF_HEADER));
        if ($tiff_order !== null) {
            $data_window = new DataWindow($data_element, strlen(self::EXIF_HEADER), $data_element->getSize() - strlen(self::EXIF_HEADER));
            $tiff_collection = $this->getCollection()->getItemCollection('Tiff');
            $tiff_class = $tiff_collection->getPropertyValue('class');
            $tiff = new $tiff_class($tiff_collection, $this);
            $tiff->loadFromData($data_window);
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Tiff data.
            $entry = new Undefined($this, [$data_element->getBytes()]);
            $this->error("TIFF header not found. Parsed {text}", ['text' => $entry->toString()]);
        }

        $this->valid = true;
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
