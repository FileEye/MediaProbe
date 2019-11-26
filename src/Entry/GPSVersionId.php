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
    public function toString(array $options = [])
    {
        return implode('.', $this->getValue());
    }
}
