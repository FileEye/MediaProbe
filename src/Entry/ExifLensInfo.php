<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;

/**
 * Decode text for an Exif/LensInfo tag.
 */
class ExifLensInfo extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $options['format'] = 'exiftool';
        $val = $this->getValue($options);
        if ($val[0] == $val[1]) {
            $str = $val[0];
        } else {
            $str = $val[0] . '-'. $val[1];
        }
        $str .= 'mm f/';
        if ($val[3] === 'undef') {
            $str .= '?';
        } elseif ($val[2] == $val[3]) {
            $str .= $val[2];
        } else {
            $str .= $val[2] . '-'. $val[3];
        }

        return $str;
    }
}
