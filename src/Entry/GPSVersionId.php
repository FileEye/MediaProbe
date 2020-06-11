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
        if ($format === 'phpExif') {
            return $this->toBytes();
        }
        return parent::getValue();
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return implode('.', $this->getValue());
    }
}
