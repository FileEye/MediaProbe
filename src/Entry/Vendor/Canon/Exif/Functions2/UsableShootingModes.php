<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom UsableShootingModes tags.
 */
class UsableShootingModes extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $val = $this->getValue($options);
            $str = $val[0] === 0 ? 'Disable; Flags 0x' : 'Enable; Flags 0x';
            $str .= dechex($val[1]);
            return $str;
        }
        return parent::toString($options);
    }
}
