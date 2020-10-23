<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Target Exposure Time tags.
 */
class CanonTargetExposureTime extends CanonExposureTime
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        if ($value < 0.25001 and $value > 0) {
            return sprintf("1/%d", int(0.5 + 1 / $value));
        }
        $ret = sprintf("%.1f", $value);
        return $ret;
    }
}
