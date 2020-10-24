<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Processing WhiteBalance tags.
 */
class CanonProcessingWhiteBalance extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($this->value[0] < 0) {
            if ($alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonCameraInfo']/tag[@name='WhiteBalance']/entry")) {
                return $alternate->getValue($options);
            }
        }
        return $this->value[0];
    }
}
