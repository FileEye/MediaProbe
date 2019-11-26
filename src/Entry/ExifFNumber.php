<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;
use FileEye\MediaProbe\MediaProbe;

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
        return MediaProbe::fmt('f/%.01f', $this->getValue()[0] / $this->getValue()[1]);
    }
}
