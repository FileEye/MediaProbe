<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Byte;

/**
 * Common handler for Canon Macro Magnification tags.
 */
class CanonCIMacroMagnification extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return exp((75 - $this->value[0]) * log(2) * 3 / 40);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return round($this->getValue());
    }
}
