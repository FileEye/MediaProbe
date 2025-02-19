<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;

/**
 * Handler for Canon Exposure Time tags.
 */
class ExposureTime extends SignedShort
{
    use ExifTrait;

    public function getValue(array $options = []): mixed
    {
        $alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonCameraInfo']/tag[@name='ExposureTime']");
        if ($alternate) {
            assert($alternate instanceof Tag);
            return $alternate->getValue($options);
        }
        return exp(-$this->canonEv(parent::getValue()) * log(2));
    }

    public function toString(array $options = []): string
    {
        return $this->exposureTimeToString($this->getValue());
    }
}
