<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Sharpness tags.
 */
class Sharpness extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative_sharpness = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name!='CanonCameraSettings']/tag[@name='Sharpness']/entry")) {
            $value = $alternative_sharpness->getValue($options);
        } else {
            $value = $this->value[0];
        }

        return $value === 0x7fff ? 0 : $value;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $val = $this->getValue();
        return $val > 0 ? "+$val" : $val;
    }
}
