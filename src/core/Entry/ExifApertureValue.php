<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Entry\Core\Rational;
use FileEye\ImageInfo\core\ImageInfo;

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
        return ImageInfo::fmt('%.01f', pow(2, $this->getValue()[0] / $this->getValue()[1] / 2));
    }
}
