<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom MultiFunctionLock tags.
 */
class MultiFunctionLock extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $val = $this->getValue($options);
        $ret = [];
        $ret[] = $this->getMappedText($val[0]);
        for ($i = 0; $i < 3; $i++) {
            $mask = 2 ** $i;
            if ($val[1] & $mask) {
                switch ($i) {
                    case 0:
                        $ret[] = 'Main dial';
                        break;
                    case 1:
                        $ret[] = 'Quick control dial';
                        break;
                    case 2:
                        $ret[] = 'Multi-controller';
                        break;
                }
            }
        }
        return implode('; ', $ret);
    }
}
