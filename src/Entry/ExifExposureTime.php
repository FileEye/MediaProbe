<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Rational;
use ExifEye\core\ExifEye;

/**
 * Decode text for an Exif/ExposureTime tag.
 */
class ExifExposureTime extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        if ($this->getValue()[0] / $this->getValue()[1] < 1) {
            return ExifEye::fmt('1/%d sec.', $this->getValue()[1] / $this->getValue()[0]);
        } else {
            return ExifEye::fmt('%d sec.', $this->getValue()[0] / $this->getValue()[1]);
        }
    }
}
