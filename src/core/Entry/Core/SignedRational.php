<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataElement;
use ExifEye\core\ExifEye;

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
    protected $formatName = 'SignedRational';

    /**
     * {@inheritdoc}
     */
    protected $format;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        $data_offset = $options['data_offset'];
        $components = $options['components'];
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_element->getSignedRational($data_offset + ($i * 8));
        }

        $this->setValue($args);

        return $this;
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
