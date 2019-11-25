<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Rational;
use FileEye\ImageProbe\core\ImageProbe;

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
            return ImageProbe::fmt('1/%d sec.', $this->getValue()[1] / $this->getValue()[0]);
        } else {
            return ImageProbe::fmt('%d sec.', $this->getValue()[0] / $this->getValue()[1]);
        }
    }
}
