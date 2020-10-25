<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon CameraSettings Lens Type tags.
 */
class CanonCameraSettingsLensType extends Short
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

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        return $this->getMappedText($value);
/*        if (!$lens_type = $this->getRootElement()->getElement("//makerNote[@name='Canon']/map[@name='CanonCameraInfo']/tag[@name='LensType']/entry")) {
            return 'n/a';
        } else {
            return $lens_type->toString($options);
        }*/
    }
}
