<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\ShotInfo;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Entry\Core\SignedShort;

/**
 * Handler for Canon ShotInfo AFPointsInFocus tags.
 */
class AFPointsInFocus extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($options['format'] ?? null === 'exiftool') {
            $alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name!='CanonShotInfo']/tag[@name='AFPointsInFocus']");
            if ($alternative) {
                assert($alternative instanceof Tag);
                return $alternative->getValue($options);
            } else {
                return parent::getValue();
            }
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->resolveText(parent::getValue());
    }
}
