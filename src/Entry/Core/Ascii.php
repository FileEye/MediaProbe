<?php

namespace FileEye\MediaProbe\Entry\Core;

/**
 * Class for holding a NUL terminated ASCII string.
 */
class Ascii extends EntryBase
{
    protected $name = 'Ascii';
    protected $formatName = 'Ascii';

    protected function validateDataElement(): void
    {
        // Check the last byte is NUL.
        if (substr($this->dataElement->getBytes(), -1) !== "\x0") {
            $this->notice('Ascii entry missing final NUL character.');
            $this->valid = false;
        }

        $this->debug("text: {text}", ['text' => $this->toString()]);
    }

    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        $val = rtrim($this->dataElement->getBytes(), "\x0");
        if ($format === 'exiftool') {
            $val = rtrim($val, " ");
            $first_zero_pos = strpos($val, "\x0");
            return substr($val, 0, $first_zero_pos === false ? strlen($val) : $first_zero_pos);
        }
        return $val === '' ? null : $val;
    }

    public function toString(array $options = []): string
    {
        $first_zero_pos = strpos($this->dataElement->getBytes(), "\x0");
        $value = substr($this->dataElement->getBytes(), 0, $first_zero_pos === false ? strlen($this->dataElement->getBytes()) : $first_zero_pos);
        return $this->resolveText($value);
    }
}
