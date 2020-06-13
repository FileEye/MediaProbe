<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;
use FileEye\MediaProbe\MediaProbe;

/**
 * Decode text for an Exif/ApertureValue tag.
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
            return pow(2, $this->getValue()[0] / $this->getValue()[1] / 2);
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
