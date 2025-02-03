<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Short;

/**
 * Decoder for Canon CameraSettings Lens Type tags.
 */
class CameraSettingsLensType extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/map[@name='CanonCameraInfo']/tag[@name='LensType']/entry")) {
            return $alternate->getValue($options);
        } else {
            return parent::getValue();
        }
    }
}
