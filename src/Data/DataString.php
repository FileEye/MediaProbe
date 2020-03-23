<?php

namespace FileEye\MediaProbe\Data;

/**
 * A value object holding generic data, as bytes.
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
    protected $data;

    /**
     * Construct a new DataString object with the data supplied.
     *
     * @param string $data
     *   The data string.
     */
    public function __construct(string $data)
    {
        $this->data = $data;
        $this->start = 0;
        $this->size = strlen($this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function getBytes(int $start = 0, ?int $size = null): string
    {
        if ($start < 0) {
            $start += $this->size;
        }
        $this->validateOffset($start);

        $size = $size ?? ($this->size - $start);
        if ($size <= 0) {
            $size += $this->size - $start;
        }
        $this->validateOffset($start + $size - 1);

        return substr($this->data, $start, $size);
    }
}
