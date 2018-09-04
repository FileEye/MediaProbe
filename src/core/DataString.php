<?php

namespace ExifEye\core;

/**
 * A value object holding the data of an image, as bytes.
 */
class DataString extends DataElement
{
    /**
     * The data.
     *
     * The string can contain any kind of data, including binary data.
     *
     * @var string
     */
    protected $data = '';

    /**
     * Construct a new DataString object with the data supplied.
     *
     * @param string $data
     *            the data string.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->start = 0;
        $this->size = strlen($this->data);
    }

    /**
     * Ensure an offset is within data range.
     *
     * @param integer $offset
     *            the offset to be validated.
     *
     * @throws DataException
     *            if the offset is negative or if it is greater than or equal
     *            to the current window size.
     */
    protected function validateOffset($offset)
    {
        if ($offset < 0 || $offset >= $this->size) {
            throw new DataException("Offset (%d) not within [%d, %d]", $offset, 0, $this->size - 1);
        }
    }

    /**
     * Return a portion of the data.
     *
     * @param integer|null $start
     *            the offset to the first byte returned.
     *
     * @param integer|null $size
     *            the size of the subset.
     *
     * @return string
     *            a subset of the bytes in the window.
     *
     * @throws DataException
     *            when invalid offsets are requested
     */
    public function getBytes($start = null, $size = null)
    {
        $start = $start === null ? 0 : $start;
        $size = $size === null ? $this->size : $size;
        
        $this->validateOffset($start);
        $this->validateOffset($start + $size - 1);

        return substr($this->data, $start, $size);
    }

    public function getDataString()
    {
        return $this->data;
    }

    public function getStart()
    {
        return $this->start;
    }
}
