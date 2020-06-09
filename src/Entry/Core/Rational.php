<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\MediaProbe;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        $args = [];
        for ($i = 0; $i < $item_definition->getValuesCount(); $i ++) {
            $args[] = $data_element->getRational($i * 8);
        }
        $this->setValue($args);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function formatNumber($number, array $options = [])
    {
        return $number[0] . '/' . $number[1];
/*        if ($number[1] === 0) {
            return $number[0] . '/' . $number[1];
        } else {
            return $number[0] / $number[1];
        }*/
    }
}
