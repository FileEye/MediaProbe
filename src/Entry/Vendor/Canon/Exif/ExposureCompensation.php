<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;

/**
 * Handler for Canon Exposure Compensation tags.
 */
class ExposureCompensation extends SignedShort
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
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
