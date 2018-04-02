<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Rational;
use ExifEye\core\ExifEye;

/**
 * Decode text for an Exif/SubjectDistance tag.
 */
class ExifSubjectDistance extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        return ExifEye::fmt('%.1f m', $this->getValue()[0] / $this->getValue()[1]);
    }
}
