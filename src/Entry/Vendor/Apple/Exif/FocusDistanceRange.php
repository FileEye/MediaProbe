<?php

namespace FileEye\MediaProbe\Entry\Vendor\Apple\Exif;

use FileEye\MediaProbe\Entry\Core\SignedRational;

class FocusDistanceRange extends SignedRational
{
    public function toString(array $options = []): string
    {
        $value = $this->getValue($options);
        return $value[0] <= $value[1] ?
            sprintf('%4.2f - %4.2f m', $value[0], $value[1]) :
            sprintf('%4.2f - %4.2f m', $value[1], $value[0]);
    }
}
