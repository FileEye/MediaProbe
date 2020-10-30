<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\ShotInfo;

use FileEye\MediaProbe\Entry\Vendor\Canon\Exif\FocusDistance;

/**
 * Handler for Canon ShotInfo FocusDistanceUpper tags.
 */
class FocusDistanceUpper extends FocusDistance
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonFileInfo']/tag[@name='FocusDistanceUpper']/entry")) {
            return $alternative->getValue($options);
        } else {
            return $this->value[0] / 100;
        }
    }
}
