<?php

namespace ExifEye\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;

/**
 * A primitive data object.
 */
abstract class DataElement
{
    /**
     * The data held by this window.
     *
     * The string can contain any kind of data, including binary data.
     *
     * @var DataElement
     */
    protected $dataElement;

    /**
     * The start of the current window.
     *
     * All offsets used for access into the data will count from this
     * offset, effectively limiting access to a window starting at this
     * byte.
     *
     * @var int
     */
    protected $start = 0;

    /**
     * The size of the data.
     *
     * @var int
     */
    protected $size = 0;

    /**
     * The byte order currently in use.
     *
     * This will be the byte order used when data is read using the for
     * example the {@link getShort} function. It must be one of {@link
     * ConvertBytes::LITTLE_ENDIAN} and {@link ConvertBytes::BIG_ENDIAN}.
     *
     * @var boolean
     * @see setByteOrder, getByteOrder
     */
    protected $order;

    /**
     * Get the size of the data window.
     *
     * @return integer the number of bytes covered by the window. The
     *         allowed offsets go from 0 up to this number minus one.
     *
     * @see getBytes()
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Change the byte order of the data.
     *
     * @param boolean $order
     *            the new byte order. This must be either
     *            {@link ConvertBytes::LITTLE_ENDIAN} or {@link
     *            ConvertBytes::BIG_ENDIAN}.
     */
    public function setByteOrder($order)
    {
        $this->order = $order;
    }

    /**
     * Get the currently used byte order.
     *
     * @return boolean this will be either {@link
     *         ConvertBytes::LITTLE_ENDIAN} or {@link ConvertBytes::BIG_ENDIAN}.
     */
    public function getByteOrder()
    {
        return $this->order;
    }

    /**
     * Validate an offset against the current window.
     *
     * @param integer $offset
     *            the offset to be validated. If the offset is negative
     *            or if it is greater than or equal to the current window size,
     *            then a {@link DataException} is thrown.
     *
     * @return void if the offset is valid nothing is returned, if it is
     *         invalid a new {@link DataException} is thrown.
     * @throws DataException
     */
    protected function validateOffset($offset)
    {
        if ($offset < 0 || $offset > $this->size) {
            throw new DataException('Offset %d not within [%d, %d]', $offset, 0, $this->size);
        }
    }

    /**
     * Return some or all bytes visible in the window.
     *
     * This method works just like the standard {@link substr()}
     * function in PHP with the exception that it works within the
     * window of accessible bytes and does strict range checking.
     *
     * @param integer|NULL $start
     *            the offset to the first byte returned. If a negative
     *            number is given, then the counting will be from the end of the
     *            window. Invalid offsets will result in a {@link
     *            DataException} being thrown.
     *
     * @param integer|NUL $size
     *            the size of the sub-window. If a negative number is
     *            given, then that many bytes will be omitted from the result.
     *
     * @return string a subset of the bytes in the window. This will
     *         always return no more than {@link getSize()} bytes.
     * @throws DataException
     */
    public function getBytes($start = null, $size = null)
    {
        if (is_int($start)) {
            if ($start < 0) {
                $start += $this->size;
            }
            $this->validateOffset($start);
        } else {
            $start = 0;
        }

        if (is_int($size)) {
            if ($size <= 0) {
                $size += $this->size - $start;
            }
            $this->validateOffset($start + $size);
        } else {
            $size = $this->size - $start;
        }
        return substr($this->getDataString(), $this->getStart() + $start, $size);
    }

    /**
     * Return an unsigned byte from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will
     *            return the first byte in the current allowed window. The last
     *            valid offset is equal to {@link getSize()}-1. Invalid offsets
     *            will result in a {@link DataException} being
     *            thrown.
     *
     * @return integer the unsigned byte found at offset.
     * @throws DataException
     */
    public function getByte($offset = 0)
    {
        /*
         * Validate the offset --- this throws an exception if offset is
         * out of range.
         */
        $this->validateOffset($offset);

        /* Translate the offset into an offset into the data. */
        $offset += $this->getStart();

        /* Return an unsigned byte. */
        return ConvertBytes::toByte(substr($this->getDataString(), $offset, 1), 0);
    }

    /**
     * Return a signed byte from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will
     *            return the first byte in the current allowed window. The last
     *            valid offset is equal to {@link getSize()}-1. Invalid offsets
     *            will result in a {@link DataException} being
     *            thrown.
     *
     * @return integer the signed byte found at offset.
     * @throws DataException
     */
    public function getSignedByte($offset = 0)
    {
        /*
         * Validate the offset --- this throws an exception if offset is
         * out of range.
         */
        $this->validateOffset($offset);

        /* Translate the offset into an offset into the data. */
        $offset += $this->getStart();

        /* Return a signed byte. */
        return ConvertBytes::toSignedByte(substr($this->getDataString(), $offset, 1), 0);
    }

    /**
     * Return an unsigned short read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will
     *            return the first short available in the current allowed window.
     *            The last valid offset is equal to {@link getSize()}-2. Invalid
     *            offsets will result in a {@link DataException}
     *            being thrown.
     *
     * @return integer the unsigned short found at offset.
     * @throws DataException
     */
    public function getShort($offset = 0)
    {
        /*
         * Validate the offset+1 to see if we can safely get two bytes ---
         * this throws an exception if offset is out of range.
         */
        $this->validateOffset($offset);
        $this->validateOffset($offset + 1);

        /* Translate the offset into an offset into the data. */
        $offset += $this->getStart();

        /* Return an unsigned short. */
        return ConvertBytes::toShort(substr($this->getDataString(), $offset, 2), 0, $this->order);
    }

    /**
     * Return a signed short read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will
     *            return the first short available in the current allowed window.
     *            The last valid offset is equal to {@link getSize()}-2. Invalid
     *            offsets will result in a {@link DataException}
     *            being thrown.
     *
     * @return integer the signed short found at offset.
     * @throws DataException
     */
    public function getSignedShort($offset = 0)
    {
        /*
         * Validate the offset+1 to see if we can safely get two bytes ---
         * this throws an exception if offset is out of range.
         */
        $this->validateOffset($offset);
        $this->validateOffset($offset + 1);

        /* Translate the offset into an offset into the data. */
        $offset += $this->getStart();

        /* Return a signed short. */
        return ConvertBytes::toSignedShort(substr($this->getDataString(), $offset, 2), 0, $this->order);
    }

    /**
     * Return an unsigned long read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will
     *            return the first long available in the current allowed window.
     *            The last valid offset is equal to {@link getSize()}-4. Invalid
     *            offsets will result in a {@link DataException}
     *            being thrown.
     *
     * @return integer the unsigned long found at offset.
     * @throws DataException
     */
    public function getLong($offset = 0)
    {
        /*
         * Validate the offset+3 to see if we can safely get four bytes
         * --- this throws an exception if offset is out of range.
         */
        $this->validateOffset($offset);
        $this->validateOffset($offset + 3);

        /* Translate the offset into an offset into the data. */
        $offset += $this->getStart();

        /* Return an unsigned long. */
        return ConvertBytes::toLong(substr($this->getDataString(), $offset, 4), 0, $this->order);
    }

    /**
     * Return a signed long read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will
     *            return the first long available in the current allowed window.
     *            The last valid offset is equal to {@link getSize()}-4. Invalid
     *            offsets will result in a {@link DataException}
     *            being thrown.
     *
     * @return integer the signed long found at offset.
     * @throws DataException
     */
    public function getSignedLong($offset = 0)
    {
        /*
         * Validate the offset+3 to see if we can safely get four bytes
         * --- this throws an exception if offset is out of range.
         */
        $this->validateOffset($offset);
        $this->validateOffset($offset + 3);

        /* Translate the offset into an offset into the data. */
        $offset += $this->getStart();

        /* Return a signed long. */
        return ConvertBytes::toSignedLong(substr($this->getDataString(), $offset, 4), 0, $this->order);
    }

    /**
     * Return an unsigned rational read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will
     *            return the first rational available in the current allowed
     *            window. The last valid offset is equal to {@link getSize()}-8.
     *            Invalid offsets will result in a {@link
     *            DataException} being thrown.
     *
     * @return array the unsigned rational found at offset. A rational
     *         number is represented as an array of two numbers: the enumerator
     *         and denominator. Both of these numbers will be unsigned longs.
     * @throws DataException
     */
    public function getRational($offset = 0)
    {
        return [
            $this->getLong($offset),
            $this->getLong($offset + 4)
        ];
    }

    /**
     * Return a signed rational read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will
     *            return the first rational available in the current allowed
     *            window. The last valid offset is equal to {@link getSize()}-8.
     *            Invalid offsets will result in a {@link
     *            DataException} being thrown.
     *
     * @return array the signed rational found at offset. A rational
     *         number is represented as an array of two numbers: the enumerator
     *         and denominator. Both of these numbers will be signed longs.
     * @throws DataException
     */
    public function getSignedRational($offset = 0)
    {
        return [
            $this->getSignedLong($offset),
            $this->getSignedLong($offset + 4)
        ];
    }

    /**
     * Return a string representation of the data window.
     *
     * @return string a description of the window with information about
     *         the number of bytes accessible, the total number of bytes, and
     *         the window start and stop.
     */
    public function toString()
    {
        return ExifEye::fmt(
            'DataWindow: %d bytes in [%d, %d] of %d bytes',
            $this->size,
            $this->start,
            $this->start + $this->size,
            strlen($this->getDataString())
        );
    }

    public function getDataString()
    {
        return isset($this->dataElement) ? $this->dataElement->getDataString() : null;
    }

    public function getStart()
    {
        return isset($this->dataElement) ? $this->dataElement->getStart() + $this->start : $this->start;
    }
}
