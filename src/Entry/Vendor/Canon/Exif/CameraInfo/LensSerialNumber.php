<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Entry\Core\Undefined;

/**
 * Handler for Canon Lens Serial Number tags.
 */
class LensSerialNumber extends Undefined
{
    public function getValue(array $options = []): mixed
    {
        $alternate = $this->getRootElement()->getElement("//ifd[@name='ExifIFD']/tag[@name='LensSerialNumber']");
        if ($alternate) {
            assert($alternate instanceof Tag);
            return $alternate->getValue($options);
        } else {
            return bin2hex($this->dataElement->getBytes());
        }
    }

    public function toString(array $options = []): string
    {
        return $this->getValue();
    }
}
