<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
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
    protected $name = 'SignedByte';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'SignedByte';

    const MIN = -128;
    const MAX = 127;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->value->getSignedByte($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($this->components == 1) {
            return $this->value->getSignedByte();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->value->getSignedByte($i);
        }
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return chr($number);
    }
}
