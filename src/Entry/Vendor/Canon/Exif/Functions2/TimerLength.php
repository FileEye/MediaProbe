<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom TimerLength tags.
 */
class TimerLength extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $val = $this->getValue($options);
        $ret = [];
        $ret[] = $this->getMappedText($val[0]);
        $ret[] = '6 s: ' . $val[1];
        $ret[] = '16 s: ' . $val[2];
        $ret[] = 'After release: ' . $val[3];
        return implode('; ', $ret);
    }
}
