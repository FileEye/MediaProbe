<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;
use FileEye\MediaProbe\MediaProbe;

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
        return MediaProbe::fmt('%.1f mm', $this->getValue()[0] / $this->getValue()[1]);
    }
}
