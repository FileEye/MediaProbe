<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom tags representing ISO speed range.
 */
class CustomIsoSpeedRange extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $value = parent::getValue();
            if (!is_array($value)) {
                return $value;
            }
            $v = [];
            $v[0] = $value[0];
            $v[1] = $value[1] < 2 ? $value[1] : ($value[1] < 1000 ? exp(($value[1] / 8 - 9) * log(2)) * 100 : 0);
            $v[2] = $value[2] < 2 ? $value[2] : ($value[2] < 1000 ? exp(($value[2] / 8 - 9) * log(2)) * 100 : 0);
            return $v;
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $val = $this->getValue($options);
            if (!is_array($val)) {
                return 'n/a';
            }
            $str = $val[0] === 0 ? 'Disable; Max ' : 'Enable; Max ';
            $str .= $val[1] . '; Min ' . $val[2];
            return $str;
        }
        return parent::toString($options);
    }
}
