<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding unsigned shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts.
 */
class Short extends NumberBase
{
    protected string $name = 'Short';
    protected string $formatName = 'Short';
    protected int $formatSize = 2;

    const MIN = 0;
    const MAX = 65535;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getShort($offset);
    }

    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getShort();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getShort($i * 2);
        }
        return $ret;
    }

    public function numberToBytes(int|string $number, int $order): string
    {
        return ConvertBytes::fromShort($number, $order);
    }
}
