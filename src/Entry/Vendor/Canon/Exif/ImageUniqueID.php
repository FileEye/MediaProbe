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
    public function getValue(array $options = []): mixed
    {
        $str = '';
        foreach (parent::getValue() as $v) {
            $str .= chr($v);
        }
        return bin2hex($str);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue();
    }
}
