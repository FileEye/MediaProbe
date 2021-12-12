<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom ApplyShootingMeteringMode tags.
 */
class ApplyShootingMeteringMode extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $val = $this->getValue($options);
        $ret = [];
        $ret[] = $this->getMappedText($val[0]);
        for ($i = 1; $i < count($val); $i++) {
            $ret[] = (string) $val[$i];
        }
        return implode('; ', $ret);
    }
}
