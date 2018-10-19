<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataElement;
use ExifEye\core\ExifEye;

/**
 * Class for holding unsigned rational numbers.
 *
 * This class can hold rational numbers, consisting of a numerator and
 * denominator both of which are of type unsigned long. Each rational is
 * represented by an array with just two entries: the numerator and the
 * denominator, in that order.
 *
 * The class can hold either just a single rational or an array of rationals.
 */
class Rational extends Long
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Rational';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Rational';

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
    protected $min = 0;

    /**
     * {@inheritdoc}
     */
    protected $max = 4294967295;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        $data_offset = $options['data_offset'];
        $components = $options['components'];
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_element->getRational($data_offset + ($i * 8));
        }

        $this->setValue($args);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function formatNumber($number, $short = false)
    {
        return $number[0] . '/' . $number[1];
    }
}
