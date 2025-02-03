<?php

namespace FileEye\MediaProbe\Data;

/**
 * A DataElement object holding a file's data.
 */
final class DataFile extends DataElement
{
    /**
     * The file path.
     *
     * @var string
     */
    private $filePath;

    /**
     * The file handle.
     *
     * @var \SplFileObject
     */
    private $fileHandle;

    /**
     * Construct a new DataFile object with the file supplied.
     *
     * @param string $filePath
     *   The file path.
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->fileHandle = new \SplFileObject($this->filePath, 'r');
        $this->start = 0;
        $this->size = $this->fileHandle->fstat()['size'];
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

        $this->fileHandle->fseek($offset);
        return $this->fileHandle->fread($size);
    }
}
