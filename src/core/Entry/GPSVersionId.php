<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Entry\Core\Byte;

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
