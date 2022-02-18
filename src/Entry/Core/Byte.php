<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;

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
    protected $name = 'Byte';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Byte';

    const MIN = 0;
    const MAX = 255;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getByte($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
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
    public function numberToBytes($number, $order)
    {
        return chr($number);
    }
}
