<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\Byte;

/**
 * Common handler for Canon Camera Temperature tags.
 */
class CameraTemperature extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->dataElement->getByte(0) - 128;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return "{$this->getValue()} C";
    }
}
