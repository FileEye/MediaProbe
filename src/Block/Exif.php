<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\InvalidDataException;
use ExifEye\core\JpegContent;

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
    public function __construct()
    {
        parent::__construct(null);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        $this->debug('Parsing {size} bytes of Exif data...', ['size' => $data_window->getSize()]);

        // There must be at least 6 bytes for the Exif header.
        if ($data_window->getSize() < 6) {
            $this->debug('Expected at least 6 bytes of Exif data, found just {size} bytes.', ['size' => $data_window->getSize()]);
            return false;
        }

        // Verify the Exif header.
        if ($data_window->strcmp(0, self::EXIF_HEADER)) {
            $data_window->setWindowStart(strlen(self::EXIF_HEADER));
        } else {
            $this->debug('Exif header not found.');
            return false;
        }

        // The rest is TIFF data.
        $tiff = new Tiff(false, $this);
        $tiff->loadFromData($data_window);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes()
    {
        return self::EXIF_HEADER . $this->first('tiff')->toBytes();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return ExifEye::tra("Dumping Exif data...\n") . $this->first('tiff')->__toString();
    }
}
