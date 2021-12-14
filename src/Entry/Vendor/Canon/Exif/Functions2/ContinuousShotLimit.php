<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom ContinuousShotLimit tags.
 */
class ContinuousShotLimit extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $val = $this->getValue($options);
        $ret = [];
        $ret[] = $this->getMappedText($val[0]);
        $ret[] = $val[1] . ' shots';
        return implode('; ', $ret);
    }
}
