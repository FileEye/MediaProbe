<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;
use FileEye\MediaProbe\MediaProbe;

/**
 * Decode text for an Exif/ExposureTime tag.
 */
class ExifExposureTime extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        if ($this->getValue()[0] / $this->getValue()[1] < 1) {
            return MediaProbe::fmt('1/%d sec.', $this->getValue()[1] / $this->getValue()[0]);
        } else {
            return MediaProbe::fmt('%d sec.', $this->getValue()[0] / $this->getValue()[1]);
        }
    }
}
