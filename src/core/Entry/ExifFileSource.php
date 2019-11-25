<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Undefined;

/**
 * Decode text for an Exif/FileSource tag.
 */
class ExifFileSource extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        switch (ord($value[0])) {
            case 0x03:
                return 'DSC';
            default:
                return sprintf('0x%02X', ord($value[0]));
        }
    }
}
