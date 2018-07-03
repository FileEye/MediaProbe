<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Rational;
use ExifEye\core\ExifEye;

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
        return ExifEye::fmt('%.1f mm', $this->getValue()[0] / $this->getValue()[1]);
    }
}
