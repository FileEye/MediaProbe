<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding signed longs.
 *
 * This class can hold longs, either just a single long or an array of
 * longs.
 */
class SignedLong extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'SignedLong';

    /**
     * {@inheritdoc}
     */
    protected string $formatName = 'SignedLong';

    /**
     * {@inheritdoc}
     */
    protected int $formatSize = 4;

    const MIN = -2147483648;
    const MAX = 2147483647;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getSignedLong($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getSignedLong();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getSignedLong($i * 4);
        }
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes(int $number, int $order): string
    {
        return ConvertBytes::fromSignedLong($number, $order);
    }
}
