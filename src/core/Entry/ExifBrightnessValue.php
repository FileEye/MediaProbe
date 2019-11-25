<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\SignedRational;

/**
 * Decode text for an Exif/BrightnessValue tag.
 */
class ExifBrightnessValue extends SignedRational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return (string) ($this->getValue()[0] / $this->getValue()[1]);
    }
}
