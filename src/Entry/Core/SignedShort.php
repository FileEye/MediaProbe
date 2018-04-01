<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\Format;
use ExifEye\core\Utility\Convert;

/**
 * Class for holding signed shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts. The class will be used to manipulate any of the Exif
 * tags which has format {@link Format::SSHORT}.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class SignedShort extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::SSHORT;

    /**
     * {@inheritdoc}
     */
    protected $min = -32768;

    /**
     * {@inheritdoc}
     */
    protected $max = 32767;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($ifd_id, $tag_id, $format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getSignedShort($data_offset + ($i * 2));
        }
        return $args;
    }

    /**
     * Convert a number into bytes.
     *
     * @param int $number
     *            the number that should be converted.
     * @param boolean $order
     *            one of {@link Convert::LITTLE_ENDIAN} and
     *            {@link Convert::BIG_ENDIAN}, specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    public function numberToBytes($number, $order)
    {
        return Convert::signedShortToBytes($number, $order);
    }
}
