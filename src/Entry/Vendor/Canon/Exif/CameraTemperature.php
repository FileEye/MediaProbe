<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;

/**
 * Handler for Canon Camera Temperature tags.
 */
class CameraTemperature extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        return parent::getValue() === 0 ? 0 : parent::getValue() - 128;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $value = $this->getValue();
        return $value === 0 ? 'n/a' : $value . ' C';
    }
}
