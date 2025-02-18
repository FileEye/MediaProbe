<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Entry\Core;

/**
 * Class for holding unsigned bytes.
 *
 * This class can hold bytes, either just a single byte or an array of bytes.
 */
class Byte extends NumberBase
{
    protected string $name = 'Byte';
    protected string $formatName = 'Byte';

    const MIN = 0;
    const MAX = 255;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getByte($offset);
    }

    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getByte();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getByte($i);
        }
        return $ret;
    }

    public function numberToBytes(int|string $number, int $order): string
    {
        return chr($number);
    }
}
