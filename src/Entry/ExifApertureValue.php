<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Exif ApertureValue tags.
 *
 * This is displayed as an F number, but stored as an APEX value.
 */
class ExifApertureValue extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            return pow(2, $this->value[0][0] / $this->value[0][1] / 2);
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return MediaProbe::fmt('%.01f', pow(2, $this->getValue()[0] / $this->getValue()[1] / 2));
    }
}
