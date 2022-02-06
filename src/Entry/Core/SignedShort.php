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
    protected $name = 'SignedShort';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'SignedShort';

    /**
     * {@inheritdoc}
     */
    protected $formatSize = 2;

    const MIN = -32768;
    const MAX = 32767;

    protected function getNumberFromDataElement(int $offset): int
    {
        return $this->value->getSignedShort($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($this->components == 1) {
            return $this->value->getSignedShort();
        }
        $ret = [];
        for ($i = 0; $i < $this->components; $i++) {
            $ret[] = $this->value->getSignedShort($i * 2);
        }
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromSignedShort($number, $order);
    }
}
