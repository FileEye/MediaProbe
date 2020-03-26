<?php

namespace FileEye\MediaProbe\Data;

use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Abstract class representing a data element in MediaProbe.
 *
 * Real implementation can be strings of data, windows of data on underlying
 * data elements, etc.
 */
abstract class DataElement
{
    /**
     * The offset start of this element against the real underlying element.
     *
     * All offsets used for access into the data element will count from this
     * offset, effectively limiting access to a window starting at this byte.
     *
     * @var int
     */
    protected $start;

    /**
     * The size of the data element.
     *
     * @var int
     */
    protected $size;

    /**
     * The byte order.
     *
     * This will be the byte order used when data is read using the getter
     * functions. It must be one of ConvertBytes::LITTLE_ENDIAN or
     * ConvertBytes::BIG_ENDIAN.
     *
     * @var int
     */
    protected $order;

    /**
     * Gets the offset start of this element.
     *
     * @return integer
     *   The offset start of this element against the real underlying element.
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * Gets the size of the data element.
     *
     * @return integer
     *   The number of bytes covered by this data element. The allowed offsets
     *   go from 0 up to this number minus one.
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Gets the absolute offset against the real underlying element.
     *
     * @param int $offset
     *   (Optional) The relative offset within this data element. Defaults to 0.
     *
     * @return integer
     *   The absolute offset.
     */
    public function getAbsoluteOffset(int $offset = 0): int
    {
        return $this->getStart() + $offset;
    }

    /**
     * Validates an offset.
     *
     * @param integer $offset
     *   The offset to be validated.
     *
     * @throws DataException
     *   When the requested offset is out of bounds.
     */
    protected function validateOffset(int $offset): void
    {
        if ($offset < 0 || $offset > ($this->size - 1)) {
            throw new DataException('Offset out of bounds - rel %d [%d, %d], abs %d [%d, %d]',
                $offset,
                0,
                $this->size - 1,
                $this->getAbsoluteOffset($offset),
                $this->getAbsoluteOffset(0),
                $this->getAbsoluteOffset($this->size - 1),
            );
        }
    }

    /**
     * Sets the byte order of the data element.
     *
     * @param int $order
     *   The byte order.
     */
    public function setByteOrder(int $order): void
    {
        $this->order = $order;
    }

    /**
     * Gets the byte order of the data element.
     *
     * @return int
     *   The byte order.
     */
    public function getByteOrder(): int
    {
        return $this->order;
    }

    /**
     * Gets a specific portion of bytes from the data element.
     *
     * @param int|null $start
     *   (Optional) The offset, relative to the data element, to the first byte
     *   returned. If omitted, the bytes will be returned from the first byte
     *   in the data element.
     *
     * @param int|null $size
     *   (Optional) The number of bytes to be returned. If omitted, all the
     *   bytes to the end of the data element will be returned.
     *
     * @return string
     *   The bytes from the data element.
     *
     * @throws DataException
     *   When the requested bytes are out of bounds of the data element.
     */
    abstract public function getBytes(int $start = 0, ?int $size = null): string;

    /**
     * Return an unsigned byte from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-1.
     *
     * @return integer
     *            the unsigned byte found at offset.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getByte($offset = 0)
    {
        return ConvertBytes::toByte($this->getBytes($offset, 1));
    }

    /**
     * Return a signed byte from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-1.
     *
     * @return integer
     *            the signed byte found at offset.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getSignedByte($offset = 0)
    {
        return ConvertBytes::toSignedByte($this->getBytes($offset, 1));
    }

    /**
     * Return an unsigned short read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-2.
     *
     * @return integer
     *            the unsigned short found at offset.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getShort($offset = 0)
    {
        return ConvertBytes::toShort($this->getBytes($offset, 2), $this->getByteOrder());
    }

    /**
     * Return an unsigned short read from the data, reversed byte order.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-2.
     *
     * @return integer
     *            the unsigned short found at offset.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getShortRev($offset = 0)
    {
        return ConvertBytes::toShortRev($this->getBytes($offset, 2), $this->getByteOrder());
    }

    /**
     * Return a signed short read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-2.
     *
     * @return integer
     *            the signed short found at offset.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getSignedShort($offset = 0)
    {
        return ConvertBytes::toSignedShort($this->getBytes($offset, 2), $this->getByteOrder());
    }

    /**
     * Return an unsigned long read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-4.
     *
     * @return integer
     *            the unsigned long found at offset.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getLong($offset = 0)
    {
        return ConvertBytes::toLong($this->getBytes($offset, 4), $this->getByteOrder());
    }

    /**
     * Return a signed long read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-4.
     *
     * @return integer
     *            the signed long found at offset.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getSignedLong($offset = 0)
    {
        return ConvertBytes::toSignedLong($this->getBytes($offset, 4), $this->getByteOrder());
    }

    /**
     * Return an unsigned rational read from the data.
     *
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-8.
     *
     * @return array
     *            the unsigned rational found at offset. A rational number is
     *            represented as an array of two numbers: the enumerator and
     *            denominator. Both of these numbers will be unsigned longs.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getRational($offset = 0)
    {
        return ConvertBytes::toRational($this->getBytes($offset, 8), $this->getByteOrder());
    }

    /**
     * Return a signed rational read from the data.
     *
     * @param integer $offset
     *            the offset into the data. An offset of zero will return the
     *            first byte in the current allowed window. The last valid
     *            offset is equal to ::getSize()-8.
     *
     * @return array
     *            the signed rational found at offset. A rational number is
     *            represented as an array of two numbers: the enumerator and
     *            denominator. Both of these numbers will be signed longs.
     *
     * @throws DataException
     *            in case of invalid offset.
     */
    public function getSignedRational($offset = 0)
    {
        return ConvertBytes::toSignedRational($this->getBytes($offset, 8), $this->getByteOrder());
    }
}
