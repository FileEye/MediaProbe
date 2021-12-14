<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\ShotInfo;

use FileEye\MediaProbe\Entry\Core\SignedShort;

/**
 * Handler for Canon ShotInfo OpticalZoomCode tags.
 */
class OpticalZoomCode extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $val = $this->getValue($options);
        return $val == 8 ? 'n/a' : $val;
    }
}
