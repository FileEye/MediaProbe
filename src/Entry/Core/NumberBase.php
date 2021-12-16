<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
        $this->value = empty($data) ? null : $data;

        $this->debug("text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if (is_null($this->value)) {
            return null;
        }
        if ($this->components == 1) {
            return $this->formatNumber($this->value[0], $options);
        }
        $ret = [];
        foreach ($this->value as $value) {
            $ret[] = $this->formatNumber($value, $options);
        }
        return $ret;
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
                $this->parsed = false;
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
                    $this->parsed = false;
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
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
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
     * Xxx update : This method is called by ::getText to format numbers. Subclasses should
     * override this method if they need more sophisticated behavior than the
     * default, which is to just return the number as is.
     *
     * @param int $number
     *            the number which will be formatted.
     *
     * @param array $options
     *            (Optional) an array of options to format the value.
     *
     * @return string the number formatted as a string suitable for display.
     */
    protected function formatNumber($number, array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            return $number == 0.0 ? 0 : round($number, 8);
        }
        return $number;
    }
}
