<?php

namespace FileEye\MediaProbe\Data;

/**
 * A DataElement object holding a string's data.
 */
final class DataString extends DataElement
{
    /**
     * The data.
     *
     * The string can contain any kind of data, including binary data.
     *
     * @var string
     */
    private $data;

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
    public function getBytes(int $offset = 0, ?int $size = null): string
    {
        if ($offset < 0) {
            $offset += $this->size;
        }
        $this->validateOffset($offset);

        $size = $size ?? ($this->size - $offset);
        if ($size <= 0) {
            $size += $this->size - $offset;
        }
        $this->validateOffset($offset + $size - 1);

        return substr($this->data, $offset, $size);
    }
}
