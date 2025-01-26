<?php

namespace FileEye\MediaProbe\Entry\Vendor\Apple\Exif;

use FileEye\MediaProbe\Entry\Core\Char;

class RunTimeFlags extends Char
{
    public function toString(array $options = []): string
    {
        $value = (int) $this->getValue($options);
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
