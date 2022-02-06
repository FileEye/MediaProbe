<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding data of undefined format.
 */
class Undefined extends EntryBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Undefined';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Undefined';

    protected function validateDataElement(): void
    {
        if ($this->hasMappedText()) {
            $this->debug("text: {text}", ['text' => $this->toString()]);
        }
        $this->debug("data: {data}", ['data' => MediaProbe::dumpHex($this->toBytes(), 12)]);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $val = str_split($this->value->getBytes());
            array_walk($val, function (&$value) {
                $value = ord($value);
            });
            return implode(' ', $val);
        }
        return $this->value->getBytes();
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        if ($this->hasMappedText()) {
            $value = unpack('C', $this->value->getBytes())[1]; // xx note that we may want to have alternative check for string... if the collection has a string index. see ifdExif/FileSource
            $text = $this->resolveText($value, true);
        }
        return $text ?? $this->components . ' byte(s) of data';
    }
}
