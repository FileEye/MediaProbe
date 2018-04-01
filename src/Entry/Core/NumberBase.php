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
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
abstract class NumberBase extends EntryBase
{
    /**
     * The minimum allowed value.
     *
     * Any attempt to change the value below this variable will result
     * in a {@link OverflowException} being thrown.
     *
     * @var int
     */
    protected $min;

    /**
     * The maximum allowed value.
     *
     * Any attempt to change the value over this variable will result in
     * a {@link OverflowException} being thrown.
     *
     * @var int
     */
    protected $max;

    /**
     * The dimension of the number held.
     *
     * Normal numbers have a dimension of one, pairs have a dimension of
     * two, etc.
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
    public function getValue()
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
     * This method will check that the number given is within the range
     * given my {@link getMin()} and {@link getMax()}, inclusive. If
     * not, then a {@link OverflowException} is thrown.
     *
     * @param
     *            int|array the number in question.
     *
     * @return void nothing, but will throw a {@link
     *         OverflowException} if the number is found to be outside the
     *         legal range and {@link ExifEye::$strict} is true.
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
     * This appends a number to the numbers already held by this entry,
     * thereby increasing the number of components by one.
     *
     * @param
     *            int|array the number to be added.
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
     * @param
     *            int the number that should be converted.
     *
     * @param
     *            PelByteOrder one of {@link Convert::LITTLE_ENDIAN} and
     *            {@link Convert::BIG_ENDIAN}, specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    abstract public function numberToBytes($number, $order);

    /**
     * Turn this entry into bytes.
     *
     * @param
     *            PelByteOrder the desired byte order, which must be either
     *            {@link Convert::LITTLE_ENDIAN} or {@link
     *            Convert::BIG_ENDIAN}.
     *
     * @return string bytes representing this entry.
     */
    public function getBytes($o)
    {
        $bytes = '';
        for ($i = 0; $i < $this->components; $i ++) {
            if ($this->dimension == 1) {
                $bytes .= $this->numberToBytes($this->value[$i], $o);
            } else {
                for ($j = 0; $j < $this->dimension; $j ++) {
                    $bytes .= $this->numberToBytes($this->value[$i][$j], $o);
                }
            }
        }
        return $bytes;
    }

    /**
     * Format a number.
     *
     * This method is called by {@link getText} to format numbers.
     * Subclasses should override this method if they need more
     * sophisticated behavior than the default, which is to just return
     * the number as is.
     *
     * @param
     *            int the number which will be formatted.
     *
     * @param
     *            boolean it could be that there is both a verbose and a
     *            brief formatting available, and this argument controls that.
     *
     * @return string the number formatted as a string suitable for
     *         display.
     */
    public function formatNumber($number, $brief = false)
    {
        return $number;
    }

    /**
     * {@inheritdoc}
     */
    public function getText($short = false)
    {
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
