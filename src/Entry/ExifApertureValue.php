<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Rational;

/**
 * Decode text for an Exif/ApertureValue tag.
 */
class ExifApertureValue extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        return ExifEye::fmt('f/%.01f', pow(2, $this->getValue()[0] / $this->getValue()[1] / 2));
    }
}
