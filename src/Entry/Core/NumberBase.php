<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Exception\OverflowException;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;

/**
 * Abstract class for numbers.
 *
 * This class can hold numbers, with range checks.
 */
abstract class NumberBase extends EntryBase
{
    /**
     * The minimum allowed value.
     *
     * Any attempt to change the value below this variable will result
     * in a OverflowException being thrown.
     *
     * @var int
     */
    protected $min;

    /**
     * The maximum allowed value.
     *
     * Any attempt to change the value over this variable will result in
     * a OverflowException being thrown.
     *
     * @var int
     */
    protected $max;

    /**
     * The dimension of the number held.
     *
     * Normal numbers have a dimension of one, pairs have a dimension of two,
     * etc.
     *
     * @var int
     */
    protected $dimension = 1;

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        foreach ($data as $v) {
            $this->validateNumber($v);
        }

        $this->components = count($data);
        $this->value = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($this->components == 1) {
            return $this->value[0];
        } else {
            return $this->value;
        }
    }

    /**
     * Validate a number.
     *
     * This method will check that the number given is within the range given
     * by ::getMin() and ::getMax(), inclusive. If not, then a OverflowException
     * is thrown.
     *
     * @param int|array $n
     *            the number in question.
     *
     * @return void nothing, but will throw an OverflowException if the number
     *         is found to be outside the legal range and ExifEye::$strict is
     *         true.
     */
    public function validateNumber($n)
    {
        if ($this->dimension == 1) {
            if ($n < $this->min || $n > $this->max) {
                ExifEye::maybeThrow(new OverflowException($n, $this->min, $this->max));
            }
        } else {
            for ($i = 0; $i < $this->dimension; $i ++) {
                if ($n[$i] < $this->min || $n[$i] > $this->max) {
                    ExifEye::maybeThrow(new OverflowException($n[$i], $this->min, $this->max));
                }
            }
        }
    }

    /**
     * Add a number.
     *
     * This appends a number to the numbers already held by this entry, thereby
     * increasing the number of components by one.
     *
     * @param int $n
     *            the number to be added.
     */
    public function addNumber($n)
    {
        $this->validateNumber($n);
        $this->value[] = $n;
        $this->components ++;
    }

    /**
     * Convert a number into bytes.
     *
     * The concrete subclasses will have to implement this method so
     * that the numbers represented can be turned into bytes.
     *
     * The method will be called once for each number held by the entry.
     *
     * @param int $number
     *            the number that should be converted.
     *
     * @param bool $byte_order
     *            one of Convert::LITTLE_ENDIAN or Convert::BIG_ENDIAN,
     *            specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    abstract protected function numberToBytes($number, $order);

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = Convert::LITTLE_ENDIAN)
    {
        $bytes = '';
        for ($i = 0; $i < $this->components; $i ++) {
            if ($this->dimension == 1) {
                $bytes .= $this->numberToBytes($this->value[$i], $byte_order);
            } else {
                for ($j = 0; $j < $this->dimension; $j ++) {
                    $bytes .= $this->numberToBytes($this->value[$i][$j], $byte_order);
                }
            }
        }
        return $bytes;
    }

    /**
     * Formats a number.
     *
     * This method is called by ::getText to format numbers. Subclasses should
     * override this method if they need more sophisticated behavior than the
     * default, which is to just return the number as is.
     *
     * @param int $number
     *            the number which will be formatted.
     *
     * @param bool $short
     *            it could be that there is both a verbose and a short
     *            formatting available, and this argument controls that.
     *
     * @return string the number formatted as a string suitable for display.
     */
    protected function formatNumber($number, $short = false)
    {
        return $number;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $short = isset($options['short']) ? $options['short'] : false;

        if ($this->components == 0) {
            return '';
        }

        $str = $this->formatNumber($this->value[0]);
        for ($i = 1; $i < $this->components; $i ++) {
            $str .= ($short ? ' ' : ', ');
            $str .= $this->formatNumber($this->value[$i]);
        }

        return $str;
    }
}
