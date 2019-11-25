<?php

namespace FileEye\ImageProbe\core\Block;

use FileEye\ImageProbe\core\Collection;
use FileEye\ImageProbe\core\Data\DataElement;
use FileEye\ImageProbe\core\Data\DataWindow;
use FileEye\ImageProbe\core\Entry\Core\Undefined;
use FileEye\ImageProbe\core\ImageProbe;
use FileEye\ImageProbe\core\Utility\ConvertBytes;

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
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        if ($size === null) {
            $size = $data_element->getSize();
        }

        $data_window = new DataWindow($data_element, $offset, $size, $data_element->getByteOrder());
        $data_window->logInfo($this->getLogger());

        $tiff_order = Tiff::getTiffSegmentByteOrder($data_window, strlen(self::EXIF_HEADER));
        if ($tiff_order !== null) {
            $tiff_collection = $this->getCollection()->getItemCollection('tiff');
            $tiff_class = $tiff_collection->getPropertyValue('class');
            $tiff = new $tiff_class($tiff_collection, $this);
            $tiff->loadFromData($data_window, strlen(self::EXIF_HEADER), $size - strlen(self::EXIF_HEADER));
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Tiff data.
            $entry = new Undefined($this, [$data_window->getBytes()]);
            $this->debug("TIFF header not found. Loaded {text}", ['text' => $entry->toString()]);
        }

        $this->valid = true;
        return $this;
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
