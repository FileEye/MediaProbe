<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Rational;
use FileEye\ImageProbe\core\ImageProbe;

/**
 * Decode text for an Exif/FocalLength tag.
 */
class ExifFocalLength extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return ImageProbe::fmt('%.1f mm', $this->getValue()[0] / $this->getValue()[1]);
    }
}
