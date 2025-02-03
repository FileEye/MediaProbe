<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;

/**
 * Handler for Canon Processing WhiteBalance tags.
 */
class ProcessingWhiteBalance extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if (parent::getValue() < 0) {
            if ($alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonCameraInfo']/tag[@name='WhiteBalance']/entry")) {
                return $alternate->getValue($options);
            }
            if ($alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonShotInfo']/tag[@name='WhiteBalance']/entry")) {
                return $alternate->getValue($options);
            }
        }
        return parent::getValue();
    }
}
