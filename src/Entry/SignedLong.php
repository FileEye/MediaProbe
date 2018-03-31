<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Format;
use ExifEye\core\Utility\Convert;

/**
 * Class for holding signed longs.
 *
 * This class can hold longs, either just a single long or an array of
 * longs. The class will be used to manipulate any of the Exif tags
 * which can have format {@link Format::SLONG}.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class SignedLong extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::SLONG;

    /**
     * {@inheritdoc}
     */
    protected $min = -2147483648;

    /**
     * {@inheritdoc}
     */
    protected $max = 2147483647;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($ifd_id, $tag_id, $format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getSignedLong($data_offset + ($i * 4));
        }
        return $args;
    }

    /**
     * Convert a number into bytes.
     *
     * @param
     *            int the number that should be converted.
     * @param
     *            PelByteOrder one of {@link Convert::LITTLE_ENDIAN} and
     *            {@link Convert::BIG_ENDIAN}, specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    public function numberToBytes($number, $order)
    {
        return Convert::signedLongToBytes($number, $order);
    }
}
