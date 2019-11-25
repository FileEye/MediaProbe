<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Rational;
use FileEye\ImageProbe\core\ImageProbe;

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
        return ImageProbe::fmt('f/%.01f', $this->getValue()[0] / $this->getValue()[1]);
    }
}
