<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Format;

/**
 * Class for holding signed bytes.
 *
 * This class can hold bytes, either just a single byte or an array of
 * bytes. The class will be used to manipulate any of the Exif tags
 * which has format {@link Format::BYTE}.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class SignedByte extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::SBYTE;

    /**
     * {@inheritdoc}
     */
    protected $min = -128;

    /**
     * {@inheritdoc}
     */
    protected $max = 127;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($ifd_id, $tag_id, $format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getSignedByte($data_offset + $i);
        }
        return $args;
    }

    /**
     * Convert a number into bytes.
     *
     * @param int $number
     *            the number that should be converted.
     *
     * @param PelByteOrder $order
     *            one of {@link Convert::LITTLE_ENDIAN} and
     *            {@link Convert::BIG_ENDIAN}, specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    public function numberToBytes($number, $order)
    {
        return chr($number);
    }
}
