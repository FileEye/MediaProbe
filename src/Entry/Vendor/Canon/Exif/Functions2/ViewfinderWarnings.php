<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom ViewfinderWarnings tags.
 */
class ViewfinderWarnings extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $value = (int) $this->getValue($options);

        $ret = [];
        for ($i = 0; $i < 32; $i++) {
            $mask = 2 ** $i;
            if ($value & $mask) {
                $text = $this->getMappedText($mask);

                if ($text === null) {
                    $text = '[' . (string) $i . ']';
                }

                $ret[] = $text;
            }
        }
        return implode(', ', $ret);
    }
}
