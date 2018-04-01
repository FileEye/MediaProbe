<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Undefined;

/**
 * Decode text for an Exif/FileSource tag.
 */
class ExifFileSource extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function getText($short = false)
    {
        $value = $this->getValue();
        switch (ord($value{0})) {
            case 0x03:
                return 'DSC';
            default:
                return sprintf('0x%02X', ord($value{0}));
        }
    }
}
