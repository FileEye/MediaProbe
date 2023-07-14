<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;

/**
 * Class for holding signed bytes.
 *
 * This class can hold bytes, either just a single byte or an array of
 * bytes.
 */
class SignedByte extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'SignedByte';

    /**
     * {@inheritdoc}
     */
    protected string $formatName = 'SignedByte';

    const MIN = -128;
    const MAX = 127;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getSignedByte($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($this->components == 1) {
            return $this->dataElement->getSignedByte();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getSignedByte($i);
        }
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes(int $number, int $order): string
    {
        return chr($number);
    }
}
