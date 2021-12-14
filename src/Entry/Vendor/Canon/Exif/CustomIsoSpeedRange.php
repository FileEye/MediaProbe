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
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $v = [];
            $v[0] = $this->value[0];
            $v[1] = $this->value[1] < 2 ? $this->value[1] : ($this->value[1] < 1000 ? exp(($this->value[1] / 8 - 9) * log(2)) * 100 : 0);
            $v[2] = $this->value[2] < 2 ? $this->value[2] : ($this->value[2] < 1000 ? exp(($this->value[2] / 8 - 9) * log(2)) * 100 : 0);
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
            $str = $val[0] === 0 ? 'Disable; Max ' : 'Enable; Max ';
            $str .= $val[1] . '; Min ' . $val[2];
            return $str;
        }
        return parent::toString($options);
    }
}
