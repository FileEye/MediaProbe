<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Byte;

/**
 * Decode text for an GPS/GPSVersionID tag.
 */
class GPSVersionId extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        switch ($format) {
            case 'exiftool':
                return implode(' ', $this->value);
            case 'phpExif':
                return $this->toBytes();
            default:
                return parent::getValue();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return implode('.', $this->getValue());
    }
}
