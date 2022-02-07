<?php

namespace FileEye\MediaProbe\Entry\Core;

/**
 * Class for holding a string entry.
 */
class Char extends EntryBase
{
    protected $name = 'Char';
    protected $formatName = 'Char';

    protected function validateDataElement(): void
    {
        $this->debug("text: {text}", ['text' => $this->toString()]);
    }

    public function getValue(array $options = [])
    {
        return $this->dataElement->getBytes();
    }

    public function toString(array $options = []): string
    {
        return $this->resolveText($this->getValue());
    }
}
