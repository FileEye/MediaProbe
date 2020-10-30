<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\MediaProbe;

/**
 * Common handler for Canon ImageUniqueID tags.
 */
class ImageUniqueID extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $str = '';
        foreach ($this->value as $v) {
            $str .= chr($v);
        }
        return bin2hex($str);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}
