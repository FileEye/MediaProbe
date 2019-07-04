<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Entry\Core\Rational;
use FileEye\ImageInfo\core\ImageInfo;

/**
 * Decode text for an Exif/SubjectDistance tag.
 */
class ExifSubjectDistance extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return ImageInfo::fmt('%.1f m', $this->getValue()[0] / $this->getValue()[1]);
    }
}
