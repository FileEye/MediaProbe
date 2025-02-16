<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding 64-bit signed longs.
 *
 * This class can hold longs, either just a single long or an array of longs.
  */
class SignedLong64 extends NumberBase
{
    protected string $name = 'SignedLong64';
    protected string $formatName = 'SignedLong64';
    protected int $formatSize = 8;

    const MIN = -9223372036854775808;
    const MAX = 9223372036854775807;

    protected function getNumberFromDataElement(int $offset): int|float
    {
        return $this->dataElement->getSignedLong64($offset);
    }

    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getSignedLong64();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getSignedLong64($i * 8);
        }
        return $ret;
    }

    public function numberToBytes(int|float $number, int $order): string
    {
        return ConvertBytes::fromSignedLong64($number, $order);
    }
}
