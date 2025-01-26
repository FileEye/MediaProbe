<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraSettings;

use FileEye\MediaProbe\Entry\Core\SignedShort;

class FlashBits extends SignedShort
{
    public function toString(array $options = []): string
    {
        $value = (int) $this->getValue($options);

        if ($value === 0) {
            return $this->getMappedText($value);
        }

        $ret = [];
        for ($i = 0; $i < 32; $i++) {
            $mask = 2 ** $i;
            if ($value & $mask) {
                $text = $this->getMappedText('Bit' . (string) $i);

                if ($text === null) {
                    $text = '[' . (string) $i . ']';
                }

                $ret[] = $text;
            }
        }
        return implode(', ', $ret);
    }
}
