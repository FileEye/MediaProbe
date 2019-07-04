<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Entry\Core\Rational;
use FileEye\ImageInfo\core\ImageInfo;

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
            return ImageInfo::fmt('1/%d sec.', $this->getValue()[1] / $this->getValue()[0]);
        } else {
            return ImageInfo::fmt('%d sec.', $this->getValue()[0] / $this->getValue()[1]);
        }
    }
}
