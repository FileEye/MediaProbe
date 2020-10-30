<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Camera Temperature tags.
 */
class CameraTemperature extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value[0] === 0 ? 0 : $this->value[0] - 128;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        return $value === 0 ? 'n/a' : $value . ' C';
    }
}
