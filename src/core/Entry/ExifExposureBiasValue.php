<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\SignedRational;

/**
 * Decode text for an Exif/ExposureBiasValue tag.
 */
class ExifExposureBiasValue extends SignedRational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return sprintf('%s%.01f', $this->getValue()[0] * $this->getValue()[1] > 0 ? '+' : '', $this->getValue()[0] / $this->getValue()[1]);
    }
}
