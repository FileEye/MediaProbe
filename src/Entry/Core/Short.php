<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding unsigned shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts.
 */
class Short extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'Short';

    /**
     * {@inheritdoc}
     */
    protected string $formatName = 'Short';

    /**
     * {@inheritdoc}
     */
    protected int $formatSize = 2;

    const MIN = 0;
    const MAX = 65535;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getShort($offset);
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function numberToBytes(int $number, int $order): string
    {
        return ConvertBytes::fromShort($number, $order);
    }
}
