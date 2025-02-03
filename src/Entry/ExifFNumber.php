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
    public function toString(array $options = []): string
    {
        $f = ($options['short'] ?? false || ($options['format'] ?? null) === 'exiftool') ? '' : 'f/';
        return sprintf('%s%.01f', $f, $this->getValue());
    }
}
