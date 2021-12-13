<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon ApertureValue tags.
 */
class ApertureValue extends SignedShort
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return exp($this->canonEv($this->value[0]) * log(2) / 2);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return sprintf("%.2g", $this->getValue());
    }
}
