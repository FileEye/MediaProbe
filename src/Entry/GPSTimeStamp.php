<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;

/**
 * Decoder for an GPS/GPSTimeStamp tag.
 */
class GPSTimeStamp extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        switch ($options['format'] ?? null) {
            case 'exiftool':
                $val = $this->getValue();
                return sprintf('%s:%02d:%s', $val[0], $val[1], $val[2]);
            default:
                return parent::toString($options);
        }
    }
}
