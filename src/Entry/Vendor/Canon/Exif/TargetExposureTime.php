<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Target Exposure Time tags.
 */
class TargetExposureTime extends ExposureTime
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        if ($value < 0.25001 && $value > 0) {
            return sprintf("1/%d", floor(0.5 + 1 / $value));
        }
        $ret = sprintf("%.1f", $value);
        return $ret;
    }
}
