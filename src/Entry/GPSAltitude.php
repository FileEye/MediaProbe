<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;

/**
 * Decoder for an GPS/GPSAltitude tag.
 */
class GPSAltitude extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $format = $options['format'] ?? null;
        switch ($format) {
            case 'exiftool':
                return sprintf('%s m', $this->getValue($options));
            default:
                return parent::toString($options);
        }
    }
}
