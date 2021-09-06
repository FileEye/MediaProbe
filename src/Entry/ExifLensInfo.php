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
    public function getValue(array $options = [])
    {
        if (($options['format'] ?? null) === 'exiftool') {
            $val = $this->getValue();
            $val[2] = $val[2] === 0 ? 'undef' : $val[2];
            $val[3] = $val[3] === 0 ? 'undef' : $val[3];
            return $val;
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        if (($options['format'] ?? null) === 'exiftool') {
            $val = $this->getValue();
            if ($val[0] == $val[1]) {
              $str = $val[0];
            } else {
              $str = $val[0] . '-'. $val[1];
            }
            $str .= 'mm f/';
            if ($val[3] == 0) {
              $str .= '?';
            } elseif ($val[2] == $val[3]) {
              $str .= $val[2];
            } else {
              $str .= $val[2] . '-'. $val[3];
            }
            return $str;
        }
        return parent::toString($options);
    }
}
