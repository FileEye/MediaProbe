<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Model\EntryBase;

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
     */
    protected int $dimension = 1;

    protected function validateDataElement(): void
    {
        // Check that the data size is consistent.
        if ($this->components * $this->formatSize !== $this->dataElement->getSize()) {
            $this->error('Invalid data size.');
        }

        // Check that the numbers given are within the min-max range allowed.
        for ($i = 0; $i < $this->components; $i++) {
            try {
                $this->getNumberFromDataElement($i * $this->formatSize);
            } catch (DataException $e) {
                $this->error($e->getMessage());
            }
        }

        $this->debug("text: {text}", ['text' => $this->toString()]);
    }

    /**
     * Return a number from the data element at specified offset.
     */
    abstract protected function getNumberFromDataElement(int $offset): int|string|array;

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
     * @param int $order
     *            one of ConvertBytes::LITTLE_ENDIAN or ConvertBytes::BIG_ENDIAN,
     *            specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    abstract public function numberToBytes(int|string $number, int $order): string;

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
    protected function formatNumber(int|string|array $number, array $options = []): int|float|string|array
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            assert(!is_array($number));
            return $number == 0.0 ? 0 : round($number, 8);
        }
        return $number;
    }
}
