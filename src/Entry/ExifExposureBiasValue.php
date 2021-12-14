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
        return $this->value[0][0] == 0 ? '0' : sprintf('%s%.01f', $this->value[0][0] * $this->value[0][1] > 0 ? '+' : '', $this->value[0][0] / $this->value[0][1]);
    }
}
