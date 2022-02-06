<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;
use FileEye\MediaProbe\MediaProbe;

/**
 * Decode text for an Exif/ExposureTime tag.
 */
class ExifExposureTime extends Rational
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        if (($options['format'] ?? null) === 'exiftool') {
            return $this->exposureTimeToString($this->getValue());
        }

        $sec = ($options['short'] ?? false) ? '' : ' sec.';

        if ($this->getValue() < 1) {
            return MediaProbe::fmt('1/%d%s', $this->value->getLong(4) / $this->value->getLong(0), $sec);
        } else {
            return MediaProbe::fmt('%d%s', $this->getValue(), $sec);
        }
    }
}
