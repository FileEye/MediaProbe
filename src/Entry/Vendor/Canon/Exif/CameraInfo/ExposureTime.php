<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\Entry\ExifTrait;
use FileEye\MediaProbe\MediaProbe;

/**
 * Common handler for Canon ExposureTime tags.
 */
class ExposureTime extends Byte
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return exp(4 * log(2) * (1 - $this->canonEv($this->dataElement->getByte(0) - 24)));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->exposureTimeToString($this->getValue());
    }
}
