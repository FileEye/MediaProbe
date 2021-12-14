<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;

/**
 * Handler for Canon Target Exposure Time tags.
 */
class TargetExposureTime extends SignedShort
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return exp(-$this->canonEv($this->value[0]) * log(2));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->exposureTimeToString($this->getValue());
    }
}
