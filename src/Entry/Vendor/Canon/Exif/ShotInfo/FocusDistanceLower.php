<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\ShotInfo;

use FileEye\MediaProbe\Entry\Vendor\Canon\Exif\FocusDistance;

/**
 * Handler for Canon ShotInfo FocusDistanceLower tags.
 */
class FocusDistanceLower extends FocusDistance
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonFileInfo']/tag[@name='FocusDistanceLower']/entry")) {
            return $alternative->getValue($options);
        } else {
            return parent::getValue();
        }
    }
}
