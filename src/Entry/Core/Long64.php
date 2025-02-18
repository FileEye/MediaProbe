<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding 64-bit unsigned longs.
 *
 * This class can hold longs, either just a single long or an array of longs.
  */
class Long64 extends NumberBase
{
    protected string $name = 'Long64';
    protected string $formatName = 'Long64';
    protected int $formatSize = 8;

    const MIN = '0';
    const MAX = '18446744073709551615';

    protected function getNumberFromDataElement(int $offset): string
    {
        return $this->dataElement->getLong64($offset);
    }

    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getLong64();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getLong64($i * 8);
        }
        return $ret;
    }

    public function numberToBytes(int|string $number, int $order): string
    {
        return ConvertBytes::fromLong64($number, $order);
    }
}
