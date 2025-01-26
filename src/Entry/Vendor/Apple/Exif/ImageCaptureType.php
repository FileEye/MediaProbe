<?php

namespace FileEye\MediaProbe\Entry\Vendor\Apple\Exif;

use FileEye\MediaProbe\Entry\Core\SignedLong;

class ImageCaptureType extends SignedLong
{
    public function toString(array $options = []): string
    {
        $value = (int) $this->getValue($options);
        return $this->getMappedText($value) ?? sprintf('Unknown (%d)', $value);
    }
}
