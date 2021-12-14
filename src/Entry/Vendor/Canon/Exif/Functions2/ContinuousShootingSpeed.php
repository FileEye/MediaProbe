<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom ContinuousShootingSpeed tags.
 */
class ContinuousShootingSpeed extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $val = $this->getValue($options);
        $ret = [];
        $ret[] = $this->getMappedText($val[0]);
        $ret[] = 'Hi ' . $val[1];
        $ret[] = 'Lo ' . $val[2];
        return implode('; ', $ret);
    }
}
