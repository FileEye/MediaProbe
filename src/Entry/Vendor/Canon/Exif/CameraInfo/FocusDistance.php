<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\ShortRev;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Focus Distance tags.
 */
class FocusDistance extends ShortRev
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value->getShortRev(0) / 100;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue() > 655.345 ? "inf" : round($this->getValue(), 2) . ' m';
    }
}
