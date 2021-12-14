<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom tags representing Aperture range.
 */
class ApertureRange extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context)
    {
        switch ($components_count) {
            case 3:
                return 0;

            case 4:
                return 1;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if (($options['format'] ?? null) === 'exiftool') {
            $v = [];
            switch (count($this->value)) {
                case 3:
                    $v[0] = $this->value[0];
                    $v[1] = exp(($this->value[1] / 8 - 1) * log(2) / 2);
                    $v[2] = exp(($this->value[2] / 8 - 1) * log(2) / 2);
                    break;
                case 4:
                    $v[0] = exp($this->value[0] / 2400);
                    $v[1] = exp($this->value[1] / 2400);
                    $v[2] = exp($this->value[2] / 2400);
                    $v[3] = exp($this->value[3] / 2400);
                    break;
            }
            return implode(' ', $v);
        }
        return parent::getValue();
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        if (($options['format'] ?? null) === 'exiftool') {
            $val = explode(' ', $this->getValue($options));
            switch (count($val)) {
                case 3:
                    $str = (int) $val[0] === 0 ?  'Disable; Closed ' : 'Enable; Closed ';
                    $str .= round($val[1]);
                    $str .= '; Open ';
                    $str .= round($val[2]);
                    return $str;

                case 4:
                    $str = 'Manual: Closed ';
                    $str .= round($val[0]);
                    $str .= '; Open ';
                    $str .= round($val[1]);
                    $str = '; Auto: Closed ';
                    $str .= round($val[1]);
                    $str .= '; Open ';
                    $str .= round($val[3]);
                    return $str;
            }
        }
        return parent::toString($options);
    }
}
