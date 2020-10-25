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
        return bin2hex($this->value);
    }
}
