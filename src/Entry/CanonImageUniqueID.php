<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\MediaProbe;

/**
 * Common handler for Canon ImageUniqueID tags.
 */
class CanonImageUniqueID extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $str = '';
        foreach ($this->value as $v) {
          $str .= $v;
        }
        return bin2hex($str);
    }
}
