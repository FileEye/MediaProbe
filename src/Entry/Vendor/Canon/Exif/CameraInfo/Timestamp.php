<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Directory Index tags.
 */
class Timestamp extends Long
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($this->dataElement->getLong(0) === 0) {
            return '0000:00:00 00:00:00';
        }
        return gmdate('Y:m:d H:i:s', $this->dataElement->getLong(0));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue();
    }
}
