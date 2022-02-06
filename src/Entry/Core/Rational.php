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
class Rational extends NumberBase
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
    protected $formatSize = 8;

    /**
     * {@inheritdoc}
     */
    protected $dimension = 2;

    const MIN = 0;
    const MAX = 4294967295;

    protected function getNumberFromDataElement(int $offset): array
    {
        return $this->value->getRational($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($this->components == 1) {
            return $this->formatNumber($this->value->getRational(), $options);
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->formatNumber($this->value->getRational($i * 8), $options);
        }
        return $ret;
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
                    return 'undef'; // xxx throw exception
                }
                $ret = $number[0] / $number[1];
                return $ret == 0.0 ? 0 : round($ret, 8);
            case 'phpExif':
                return (string) $number[0] . '/' . (string) $number[1];
            case 'core':
            default:
                if ($number[1] === 0) {
                    return 0; // xxx throw exception
                }
                $ret = $number[0] / $number[1];
                return $ret == 0.0 ? 0 : $ret;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromLong($number, $order);
    }
}
