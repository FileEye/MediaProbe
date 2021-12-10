<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Exposure Time tags.
 */
class ExposureTime extends SignedShort
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternate = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonCameraInfo']/tag[@name='ExposureTime']/entry")) {
            return $alternate->getValue($options);
        }
        return exp(-$this->canonEv($this->value[0]) * log(2));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->exposureTimeToString($this->getValue());
    }

    private function canonEv($val)
    {
        // temporarily make the number positive
        if ($val < 0) {
            $val = -$val;
            $sign = -1;
        } else {
            $sign = 1;
        }
        $frac = $val & 0x1f;
        $val -= $frac;
        // remove fraction
        // Convert 1/3 and 2/3 codes
        if ($frac == 0x0c) {
            $frac = 0x20 / 3;
        } elseif ($frac == 0x14) {
            $frac = 0x40 / 3;
        }
        return $sign * ($val + $frac) / 0x20;
    }
}
