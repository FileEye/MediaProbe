<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\ShortRev;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon CameraInfo Lens Type tags.
 */
class CanonCameraInfoLensType extends ShortRev
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        return $this->getMappedText($value, "Unknown ({$value})");
    }
}