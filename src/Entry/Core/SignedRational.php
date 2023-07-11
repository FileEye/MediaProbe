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
class SignedRational extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'SignedRational';

    /**
     * {@inheritdoc}
     */
    protected string $formatName = 'SignedRational';

    /**
     * {@inheritdoc}
     */
    protected int $formatSize = 8;

    /**
     * {@inheritdoc}
     */
    protected int $dimension = 2;

    const MIN = -2147483648;
    const MAX = 2147483647;

    protected function getNumberFromDataElement(int $offset): array
    {
        return $this->dataElement->getSignedRational($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->formatNumber($this->dataElement->getSignedRational(), $options);
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->formatNumber($this->dataElement->getSignedRational($i * 8), $options);
        }
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    protected function formatNumber(int|float|array $number, array $options = []): int|float|array|string
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

    /**
     * {@inheritdoc}
     */
    public function numberToBytes(int $number, int $order): string
    {
        return ConvertBytes::fromLong($number, $order);
    }
}
