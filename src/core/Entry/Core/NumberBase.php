<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Data\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;

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
     * @var int
     */
    protected $min;

    /**
     * The maximum allowed value.
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
        parent::setValue($data);

        foreach ($data as &$v) {
            $this->validateNumber($v);
        }

        $this->components = count($data);
        $this->value = $data;

        return $this;
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
     * by ::getMin() and ::getMax(), inclusive.
     *
     * @param int|array $n
     *            the number in question.
     *
     * @return void
     */
    public function validateNumber(&$n)
    {
        if ($this->dimension == 1) {
            if ($n < $this->min || $n > $this->max) {
                $this->error('Value {value} out of range [{min},{max}]', [
                    'value' => $n,
                    'min' => $this->min,
                    'max' => $this->max,
                ]);
                $n = 0;
                $this->valid = false;
            }
        } else {
            for ($i = 0; $i < $this->dimension; $i ++) {
                if ($n[$i] < $this->min || $n[$i] > $this->max) {
                    $this->error('Value {value} out of range [{min},{max}]', [
                        'value' => $n[$i],
                        'min' => $this->min,
                        'max' => $this->max,
                    ]);
                    $n[$i] = 0;
                    $this->valid = false;
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
     *            one of ConvertBytes::LITTLE_ENDIAN or ConvertBytes::BIG_ENDIAN,
     *            specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    abstract protected function numberToBytes($number, $order);

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
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
        if ($str = parent::toString($options)) {
            return $str;
        }

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
