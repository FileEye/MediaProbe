<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Measured EV tags.
 */
class CanonMeasuredEV extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value[0] / 32 + 5;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return round($this->getValue(), 2);
    }
}
