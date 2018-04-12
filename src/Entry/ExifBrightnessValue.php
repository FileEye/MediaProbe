<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\SignedRational;

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
        return sprintf('%f', $this->getValue()[0] / $this->getValue()[1]);
    }
}
