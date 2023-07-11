<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding signed shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts.
 */
class SignedShort extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'SignedShort';

    /**
     * {@inheritdoc}
     */
    protected string $formatName = 'SignedShort';

    /**
     * {@inheritdoc}
     */
    protected int $formatSize = 2;

    const MIN = -32768;
    const MAX = 32767;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getSignedShort($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getSignedShort();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getSignedShort($i * 2);
        }
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes(int $number, int $order): string
    {
        return ConvertBytes::fromSignedShort($number, $order);
    }
}
