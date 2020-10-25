<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Byte;

/**
 * Common handler for Canon FNumber tags.
 */
class CanonCIFNumber extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return exp(($this->value[0] - 8) / 16 * log(2));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return round($this->getValue(), 1);
    }
}
