<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Rational;

/**
 * Decode text for an Exif/FocalLength tag.
 */
class ExifFocalLength extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        return ExifEye::fmt('%.1f mm', $this->getValue()[0] / $this->getValue()[1]);
    }
}
