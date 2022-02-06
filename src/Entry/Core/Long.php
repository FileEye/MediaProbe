<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding unsigned longs.
 *
 * This class can hold longs, either just a single long or an array of longs.
  */
class Long extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Long';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Long';

    /**
     * {@inheritdoc}
     */
    protected $formatSize = 4;

    const MIN = 0;
    const MAX = 4294967295;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->dataElement->getLong($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($this->components == 1) {
            return $this->dataElement->getLong();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->dataElement->getLong($i * 4);
        }
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromLong($number, $order);
    }
}
