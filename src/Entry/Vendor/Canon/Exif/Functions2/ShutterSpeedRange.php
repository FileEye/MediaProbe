<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Entry\ExifTrait;

/**
 * Handler for CanonCustom tags representing Shutter speed range.
 */
class ShutterSpeedRange extends SignedLong
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context): mixed
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
    public function getValue(array $options = []): mixed
    {
        if (($options['format'] ?? null) === 'exiftool') {
            $v = [];
            $value = parent::getValue();
            switch (count($value)) {
                case 3:
                    $v[0] = $value[0];
                    $v[1] = exp(-($value[1] / 8 - 7) * log(2));
                    $v[2] = exp(-($value[2] / 8 - 7) * log(2));
                    break;
                case 4:
                    $v[0] = exp(-$value[0] / (1600 * log(2)));
                    $v[1] = exp(-$value[1] / (1600 * log(2)));
                    $v[2] = exp(-$value[2] / (1600 * log(2)));
                    $v[3] = exp(-$value[3] / (1600 * log(2)));
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
                    $str = (int) $val[0] === 0 ?  'Disable; Hi ' : 'Enable; Hi ';
                    $str .= $this->exposureTimeToString($val[1]);
                    $str .= '; Lo ';
                    $str .= $this->exposureTimeToString($val[2]);
                    return $str;

                case 4:
                    $str = 'Manual: Hi ';
                    $str .= $this->exposureTimeToString($val[0]);
                    $str .= '; Lo ';
                    $str .= $this->exposureTimeToString($val[1]);
                    $str = '; Auto: Hi ';
                    $str .= $this->exposureTimeToString($val[2]);
                    $str .= '; Lo ';
                    $str .= $this->exposureTimeToString($val[3]);
                    return $str;
            }
        }
        return parent::toString($options);
    }
}
