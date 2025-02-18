<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Model\EntryBase;

/**
 * Class for holding a string entry.
 */
class Char extends EntryBase
{
    protected string $name = 'Char';
    protected string $formatName = 'Char';

    protected function validateDataElement(): void
    {
        $this->debug("text: {text}", ['text' => $this->toString()]);
    }

    public function getValue(array $options = []): mixed
    {
        return $this->dataElement->getBytes();
    }

    public function toString(array $options = []): string
    {
        return $this->resolveText($this->getValue());
    }
}
