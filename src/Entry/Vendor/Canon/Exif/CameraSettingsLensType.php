<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Entry\Core\Short;

/**
 * Decoder for Canon CameraSettings Lens Type tags.
 */
class CameraSettingsLensType extends Short
{
    public function getValue(array $options = []): mixed
    {
        $alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/map[@name='CanonCameraInfo']/tag[@name='LensType']");
        if ($alternate) {
            assert($alternate instanceof Tag);
            return $alternate->getValue($options);
        } else {
            return parent::getValue();
        }
    }
}
