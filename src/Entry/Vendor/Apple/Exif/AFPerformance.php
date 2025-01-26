<?php

namespace FileEye\MediaProbe\Entry\Vendor\Apple\Exif;

use FileEye\MediaProbe\Entry\Core\SignedLong;

class AFPerformance extends SignedLong
{
    public function toString(array $options = []): string
    {
        $value = $this->getValue($options);
        return sprintf('%d %d %d', $value[0], $value[1] >> 28, $value[1] & 0xfffffff);
    }
}
