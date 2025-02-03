<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom TimerLength tags.
 */
class TimerLength extends SignedLong
{
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context): mixed
    {
        return match ($components_count) {
            3 => 0,
            4 => 1,
        };
    }

    public function toString(array $options = []): string
    {
        $val = $this->getValue($options);

        if (count($val) === 4) {
            $ret = [];
            $ret[] = $this->getMappedText($val[0]);
            $ret[] = '6 s: ' . $val[1];
            $ret[] = '16 s: ' . $val[2];
            $ret[] = 'After release: ' . $val[3];
            return implode('; ', $ret);
        } else {
            $ret = [];
            $ret[] = '6 s: ' . $val[1];
            $ret[] = '16 s: ' . $val[2];
            $ret[] = 'After release: ' . $val[3];
            return implode('; ', $ret);
        }
    }
}
