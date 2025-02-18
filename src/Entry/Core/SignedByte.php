<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Entry\Core;

/**
 * Class for holding signed bytes.
 *
 * This class can hold bytes, either just a single byte or an array of
 * bytes.
 */
class SignedByte extends NumberBase
{
    protected string $name = 'SignedByte';
    protected string $formatName = 'SignedByte';

    const MIN = -128;
    const MAX = 127;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getSignedByte($offset);
    }

    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getSignedByte();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getSignedByte($i);
        }
        return $ret;
    }

    public function numberToBytes(int|string $number, int $order): string
    {
        return chr($number);
    }
}
