<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Rational;
use ExifEye\core\ExifEye;

/**
 * Decode text for an Exif/FNumber tag.
 */
class ExifFNumber extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        return ExifEye::fmt('f/%.01f', $this->getValue()[0] / $this->getValue()[1]);
    }
}
