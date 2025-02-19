<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
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
            $alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonCameraInfo']/tag[@name='WhiteBalance']");
            if ($alternative) {
                assert($alternative instanceof Tag);
                return $alternative->getValue($options);
            }
            $alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonShotInfo']/tag[@name='WhiteBalance']");
            if ($alternative) {
                assert($alternative instanceof Tag);
                return $alternative->getValue($options);
            }
        }
        return parent::getValue();
    }
}
