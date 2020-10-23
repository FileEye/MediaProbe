<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Sharpness tags.
 */
class CanonSharpness extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        dump($this->value);
        return $this->value[0] === 0x7fff ? 0 : $this->value[0];
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        return $value > 0 ? "+$value" : $value;
    }
}
