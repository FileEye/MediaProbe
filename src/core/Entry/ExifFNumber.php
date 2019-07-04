<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Entry\Core\Rational;
use FileEye\ImageInfo\core\ImageInfo;

/**
 * Decode text for an Exif/FNumber tag.
 */
class ExifFNumber extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return ImageInfo::fmt('f/%.01f', $this->getValue()[0] / $this->getValue()[1]);
    }
}
