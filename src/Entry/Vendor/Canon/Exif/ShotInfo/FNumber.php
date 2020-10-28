<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\ShotInfo;

use FileEye\MediaProbe\Entry\Vendor\Canon\Exif\ApertureValue;

/**
 * Handler for Canon ShotInfo FNumber tags.
 */
class FNumber extends ApertureValue
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return round($this->getValue(), 1);
    }
}
