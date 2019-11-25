<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Rational;
use FileEye\ImageProbe\core\ImageProbe;

/**
 * Decode text for an Exif/ApertureValue tag.
 */
class ExifApertureValue extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return ImageProbe::fmt('%.01f', pow(2, $this->getValue()[0] / $this->getValue()[1] / 2));
    }
}
