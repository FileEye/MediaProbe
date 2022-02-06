<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedRational;

/**
 * Decode text for an Exif/ExposureBiasValue tag.
 */
class ExifExposureBiasValue extends SignedRational
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        if (($options['format'] ?? null) === 'exiftool') {
            return $this->fractionToString($this->getValue());
        }
        return $this->value->getSignedRationalFloat() == 0 ? '0' : sprintf('%s%.01f', $this->value->getSignedLong(0) * $this->value->getSignedLong(4) > 0 ? '+' : '', $this->value->getSignedRationalFloat());
    }
}
