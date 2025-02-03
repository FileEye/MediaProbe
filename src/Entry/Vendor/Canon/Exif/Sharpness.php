<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;

/**
 * Handler for Canon Sharpness tags.
 */
class Sharpness extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($alternative_sharpness = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name!='CanonCameraSettings']/tag[@name='Sharpness']/entry")) {
            $value = $alternative_sharpness->getValue($options);
        } else {
            $value = parent::getValue($options);
        }

        return $value === 0x7fff ? 0 : $value;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $val = $this->getValue();
        return $val > 0 ? "+$val" : $val;
    }
}
