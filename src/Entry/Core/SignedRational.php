<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;

/**
 * Class for holding signed rational numbers.
 *
 * This class can hold rational numbers, consisting of a numerator and
 * denominator both of which are of type unsigned long. Each rational
 * is represented by an array with just two entries: the numerator and
 * the denominator, in that order.
 *
 * The class can hold either just a single rational or an array of
 * rationals.
 */
class SignedRational extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'SignedRational';

    /**
     * {@inheritdoc}
     */
    protected $format = Format::SRATIONAL;

    /**
     * {@inheritdoc}
     */
    protected $dimension = 2;

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
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getSignedRational($data_offset + ($i * 8));
        }
        return $args;
    }

    /**
     * {@inheritdoc}
     */
    protected function formatNumber($number, $short = false)
    {
        if ($number[1] < 0) {
            // Turn output like 1/-2 into -1/2.
            return (- $number[0]) . '/' . (- $number[1]);
        } else {
            return $number[0] . '/' . $number[1];
        }
    }
}
