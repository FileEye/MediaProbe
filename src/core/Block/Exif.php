<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing Exif data.
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
    protected $type = 'exif';

    /**
     * Construct a new Exif object.
     */
    public function __construct(JpegSegment $parent_block)
    {
        parent::__construct($parent_block);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        $this->debug('Parsing {size} bytes of Exif data...', ['size' => $data_window->getSize()]);

        // Skip the EXIF header.
        $data_window->setWindowStart(strlen(self::EXIF_HEADER));

        // The rest is TIFF data.
        $tiff = new Tiff($this);
        $tiff->loadFromData($data_window);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        return self::EXIF_HEADER . $this->getElement('tiff')->toBytes();
    }

    public static function isExifSegment(DataWindow $data_window)
    {
        // There must be at least 6 bytes for the Exif header.
        if ($data_window->getSize() < 6) {
            return false;
        }

        // Verify the Exif header.
        if ($data_window->strcmp(0, self::EXIF_HEADER)) {
            return true;
        }

        return false;
    }
}
