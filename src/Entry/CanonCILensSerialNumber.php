<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Lens Serial Number tags.
 */
class CanonCILensSerialNumber extends Undefined
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
        return implode(array_map("chr", $this->value));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}
