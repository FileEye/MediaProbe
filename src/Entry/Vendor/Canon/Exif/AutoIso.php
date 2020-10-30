<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Auto ISO tags.
 */
class AutoIso extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return exp($this->value[0] / 32 * log(2)) * 100;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return round($this->getValue());
    }
}
