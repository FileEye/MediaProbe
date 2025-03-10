<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Model\EntryBase;
use FileEye\MediaProbe\Utility\HexDump;

/**
 * Class for holding data of undefined format.
 */
class Undefined extends EntryBase
{
    protected string $name = 'Undefined';
    protected string $formatName = 'Undefined';

    protected function validateDataElement(): void
    {
        if ($this->hasMappedText()) {
            $this->debug("text: {text}", ['text' => $this->toString()]);
        }
        $this->debug("data: {data}", ['data' => HexDump::dumpHex($this->toBytes(), 12)]);
    }

    public function getValue(array $options = []): mixed
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $val = str_split($this->dataElement->getBytes());
            array_walk($val, function (&$value) {
                $value = ord($value);
            });
            return implode(' ', $val);
        }
        return $this->dataElement->getBytes();
    }

    public function toString(array $options = []): string
    {
        if ($this->hasMappedText()) {
            $value = unpack('C', $this->dataElement->getBytes())[1]; // xx note that we may want to have alternative check for string... if the collection has a string index. see ifdExif/FileSource
            $text = $this->resolveText($value, true);
        }
        return $text ?? $this->components . ' byte(s) of data';
    }
}
