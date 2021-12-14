<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Decoder for Canon CameraSettings Lens Type tags.
 */
class CameraSettingsLensType extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/map[@name='CanonCameraInfo']/tag[@name='LensType']/entry")) {
            return $alternate->getValue($options);
        } else {
            return $this->value[0];
        }
    }
}
