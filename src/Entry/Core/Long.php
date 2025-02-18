<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding unsigned longs.
 *
 * This class can hold longs, either just a single long or an array of longs.
  */
class Long extends NumberBase
{
    protected string $name = 'Long';
    protected string $formatName = 'Long';
    protected int $formatSize = 4;

    const MIN = 0;
    const MAX = 4294967295;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getLong($offset);
    }

    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getLong();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getLong($i * 4);
        }
        return $ret;
    }

    public function numberToBytes(int|string $number, int $order): string
    {
        return ConvertBytes::fromLong($number, $order);
    }
}
