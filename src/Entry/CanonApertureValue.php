<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon ApertureValue tags.
 *
 * This is displayed as an F number, but stored as an APEX value.
 */
class CanonApertureValue extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $xx = $this->CanonEv($this->value[0]);
        $yy = exp($xx * log(2) / 2);
dump([$this->value, $xx, $yy]);
        return $yy;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return MediaProbe::fmt('%.01f', $this->getValue());
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
        } elsif ($frac == 0x14) {
            $frac = 0x40 / 3;
        }
        return $sign * ($val + $frac) / 0x20;
    }
}
