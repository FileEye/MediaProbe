<?php

namespace FileEye\MediaProbe\Entry\Core;

/**
 * Class for holding unsigned bytes.
 *
 * This class can hold bytes, either just a single byte or an array of bytes.
 */
class Byte extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'Byte';

    /**
     * {@inheritdoc}
     */
    protected string $formatName = 'Byte';

    const MIN = 0;
    const MAX = 255;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getByte($offset);
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function numberToBytes(int|float $number, int $order): string
    {
        return chr($number);
    }
}
