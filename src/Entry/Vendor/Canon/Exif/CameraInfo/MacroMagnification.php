<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\Byte;

/**
 * Common handler for Canon Macro Magnification tags.
 */
class MacroMagnification extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        return exp((75 - $this->dataElement->getByte(0)) * log(2) * 3 / 40);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return (string) round($this->getValue());
    }
}
