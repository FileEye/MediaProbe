<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
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
class ShortRev extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'ShortRev';

    /**
     * {@inheritdoc}
     */
    protected string $formatName = 'ShortRev';

    /**
     * {@inheritdoc}
     */
    protected int $formatSize = 2;

    const MIN = 0;
    const MAX = 65535;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getShortRev($offset);
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function numberToBytes(int $number, int $order): string
    {
        return ConvertBytes::fromShortRev($number, $order);
    }
}
