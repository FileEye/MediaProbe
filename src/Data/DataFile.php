<?php

namespace FileEye\MediaProbe\Data;

use FileEye\MimeMap\Extension;
use FileEye\MimeMap\MappingException;

/**
 * A DataElement object holding a file's data.
 */
final class DataFile extends DataElement
{
    /**
     * The file handle.
     */
    private \SplFileObject $fileHandle;

    /**
     * The array of most likely MIME types of the file.
     *
     * @var list<string>
     */
    public readonly array $typeHints;

    public function __construct(
        public readonly string $filePath,
    ) {
        // @todo lock file while reading, capture fstats to prevent overwrites.
        $this->fileHandle = new \SplFileObject($this->filePath, 'r');
        $this->start = 0;
        $this->size = $this->fileHandle->fstat()['size'];
        $this->typeHints = $this->determineMimeTypeHints();
    }

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

    /**
     * Find the most likely MIME type given the file extension.
     *
     * @return list<string>
     */
    protected function determineMimeTypeHints(): array
    {
        $fileParts = explode('.', $this->fileHandle->getFileName());
        while (array_shift($fileParts) !== null) {
            $extension = strtolower(implode('.', $fileParts));
            $mimeMapExtension = new Extension($extension);
            try {
                return $mimeMapExtension->getTypes();
            } catch (MappingException) {
                continue;
            }
        }
        return [];
    }
}
