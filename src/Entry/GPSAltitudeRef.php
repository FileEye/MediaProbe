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
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        switch ($format) {
            case 'exiftool':
                return ord($this->value[0]);
            case 'phpExif':
                return chr($this->value[0]);
            default:
                return parent::getValue();
        }
    }
}
