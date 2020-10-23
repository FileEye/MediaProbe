<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Sharpness tags.
 */
class CanonSharpness extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative_sharpness = $this->getRootElement()->getElement("//makerNote[@name='Canon']/map[@name!='CanonCameraSettings']/tag[@name='Sharpness']/entry")) {
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
        $value = $this->getValue();
        return $value > 0 ? "+$value" : $value;
    }
}
