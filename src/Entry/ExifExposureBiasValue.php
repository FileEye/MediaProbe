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
        return $this->dataElement->getSignedRationalFloat() == 0 ? '0' : sprintf('%s%.01f', $this->dataElement->getSignedLong(0) * $this->dataElement->getSignedLong(4) > 0 ? '+' : '', $this->dataElement->getSignedRationalFloat());
    }
}
