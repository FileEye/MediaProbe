<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Rational;
use FileEye\ImageProbe\core\ImageProbe;

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
        return ImageProbe::fmt('%.1f m', $this->getValue()[0] / $this->getValue()[1]);
    }
}
