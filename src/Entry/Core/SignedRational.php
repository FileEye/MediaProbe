<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\MediaProbe;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        $args = [];
        for ($i = 0; $i < $item_definition->getValuesCount(); $i ++) {
            $args[] = $data_element->getSignedRational($i * 8);
        }
        $this->setValue($args);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function formatNumber($number, array $options = [])
    {
        $format = $options['format'] ?? null;
        switch ($format) {
            case 'parsed':
                return $number;
            case 'exiftool':
                if ($number[1] === 0) {
                    return 0; // xxx throw exception
                }
                $ret = $number[0] / $number[1];
                return $ret == 0.0 ? 0 : round($ret, 8);
            case 'phpExif':
                if ($number[1] < 0) {
                    // Turn output like 1/-2 into -1/2.
                    return (- $number[0]) . '/' . (- $number[1]);
                }
                return $number[0] . '/' . $number[1];
            case 'core':
            default:
                if ($number[1] === 0) {
                    return 0; // xxx throw exception
                }
                $ret = $number[0] / $number[1];
                return $ret == 0.0 ? 0 : $ret;
        }
    }
}
