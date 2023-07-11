<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Byte;

/**
 * Decode text for an GPS/GPSAltitudeRef tag.
 */
class GPSAltitudeRef extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        $format = $options['format'] ?? null;
        switch ($format) {
            case 'exiftool':
                return (string) $this->dataElement->getByte();
            case 'phpExif':
                return chr($this->dataElement->getByte());
            default:
                return parent::getValue();
        }
    }
}
