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
    public function getValue(array $options = []): mixed
    {
        return exp($this->canonEv(parent::getValue()) * log(2) / 2);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return sprintf("%.2g", $this->getValue());
    }
}
