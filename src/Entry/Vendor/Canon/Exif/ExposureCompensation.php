<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Exposure Compensation tags.
 */
class ExposureCompensation extends SignedShort
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->canonEv(parent::getValue());
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->fractionToString($this->getValue());
    }
}
