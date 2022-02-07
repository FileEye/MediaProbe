<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
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
     * The dimension of the number held.
     *
     * Normal numbers have a dimension of one, fractions like Rational have a dimension of two.
     *
     * @var int
     */
    protected $dimension = 1;

    protected function validateDataElement(): void
    {
        // Check that the data size is consistent.
        if ($this->components * $this->formatSize !== $this->dataElement->getSize()) {
            $this->error('Invalid data size.');
            $this->valid = false;
        }

        // Check that the numbers given are within the min-max range allowed.
        for ($i = 0; $i < $this->components; $i++) {
            try {
                $this->getNumberFromDataElement($i * $this->formatSize);
            } catch (DataException $e) {
                $this->error($e->getMessage());
                $this->valid = false;
            }
        }

        $this->debug("text: {text}", ['text' => $this->toString()]);
    }

    /**
     * Return a number from the data element at specified offset.
     */
    abstract protected function getNumberFromDataElement(int $offset);

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
