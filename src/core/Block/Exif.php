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
    public function __construct(JpegSegmentApp1 $parent_block)
    {
        parent::__construct($parent_block);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, $size = null, array $options = [])
    {
        $this->debug('Loading EXIF data in [{start}-{end}] [0x{hstart}-0x{hend}], {size} bytes ...', [
            'start' => $offset,
            'end' => $offset + $size - 1,
            'hstart' => strtoupper(dechex($offset)),
            'hend' => strtoupper(dechex($offset + $size - 1)),
            'size' => $size,
        ]);

        $tiff_order = Tiff::getTiffSegmentByteOrder($data_window, $offset + strlen(self::EXIF_HEADER));
        if ($tiff_order !== null) {
            $tiff = new Tiff($this);
            $tiff->loadFromData($data_window, $offset + strlen(self::EXIF_HEADER), $size - strlen(self::EXIF_HEADER));
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Tiff data.
            $entry = new Undefined($this, [$data_window->getBytes($offset, $size)]);
            $entry->debug("TIFF header not found. Loaded {text}", ['text' => $entry->toString()]);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        return self::EXIF_HEADER . $this->getElement('*')->toBytes();
    }

    /**
     * Determines if the data is an EXIF segment.
     */
    public static function isExifSegment(DataWindow $data_window, $offset = 0)
    {
        // There must be at least 6 bytes for the Exif header.
        if ($data_window->getSize() - $offset < strlen(self::EXIF_HEADER)) {
            return false;
        }

        // Verify the Exif header.
        if ($data_window->strcmp($offset, self::EXIF_HEADER)) {
            return true;
        }

        return false;
    }
}
