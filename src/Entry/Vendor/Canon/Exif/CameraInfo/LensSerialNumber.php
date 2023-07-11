<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Lens Serial Number tags.
 */
class LensSerialNumber extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        $alternate = $this->getRootElement()->getElement("//ifd[@name='ExifIFD']/tag[@name='LensSerialNumber']/entry");
        if ($alternate) {
            return $alternate->getValue($options);
        } else {
            return bin2hex($this->dataElement->getBytes());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue();
    }
}
