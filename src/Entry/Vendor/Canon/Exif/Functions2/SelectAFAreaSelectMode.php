<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom SelectAFAreaSelectMode tags.
 */
class SelectAFAreaSelectMode extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $val = $this->getValue($options);
        $ret = [];
        $ret[] = $this->getMappedText($val[0]);
        $ret[] = sprintf("Flags 0x%x", $val[1]);
        return implode('; ', $ret);
    }
}
