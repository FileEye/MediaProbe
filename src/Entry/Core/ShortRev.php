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
class ShortRev extends NumberBase
{
    protected string $name = 'ShortRev';
    protected string $formatName = 'ShortRev';
    protected int $formatSize = 2;

    const MIN = 0;
    const MAX = 65535;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getShortRev($offset);
    }

    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getShortRev();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getShortRev($i * 2);
        }
        return $ret;
    }

    public function numberToBytes(int|string $number, int $order): string
    {
        return ConvertBytes::fromShortRev($number, $order);
    }
}
