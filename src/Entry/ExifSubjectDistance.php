<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;

/**
 * Decode text for an Exif/SubjectDistance tag.
 */
class ExifSubjectDistance extends Rational
{
    public function toString(array $options = []): string
    {
        return sprintf('%.1f m', $this->getValue());
    }
}
