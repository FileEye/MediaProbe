<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Exposure Time tags.
 */
class ExposureTime extends SignedShort
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonCameraInfo']/tag[@name='ExposureTime']/entry")) {
            return $alternate->getValue($options);
        }
        return exp(-$this->canonEv(parent::getValue()) * log(2));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->exposureTimeToString($this->getValue());
    }
}
