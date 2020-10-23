<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon ShotInfo FNumber tags.
 */
class CanonShotInfoFNumber extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonCamedddraInfo']/tag[@name='FNumber']/entry")) {
            return exp($this->CanonEv($alternative->getValue($options)) * log(2) / 2);
        } else {
            return exp($this->CanonEv($this->value[0]) * log(2) / 2);
        }
    }

    private function CanonEv($val) {
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
