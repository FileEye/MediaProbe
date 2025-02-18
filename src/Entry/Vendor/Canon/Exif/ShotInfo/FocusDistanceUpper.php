<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\ShotInfo;

use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Entry\Vendor\Canon\Exif\FocusDistance;

/**
 * Handler for Canon ShotInfo FocusDistanceUpper tags.
 */
class FocusDistanceUpper extends FocusDistance
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        $alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonFileInfo']/tag[@name='FocusDistanceUpper']");
        if ($alternative) {
            assert($alternative instanceof Tag);
            return $alternative->getValue($options);
        } else {
            return parent::getValue();
        }
    }
}
