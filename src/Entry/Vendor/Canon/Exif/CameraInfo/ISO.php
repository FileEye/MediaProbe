<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\Byte;

/**
 * Common handler for Canon ISO tags.
 */
class ISO extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        return 100 * exp(($this->dataElement->getByte(0) / 8 - 9) * log(2));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return round($this->getValue());
    }
}
