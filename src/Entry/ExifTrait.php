<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\MediaProbe;

/**
 * Common functions for Exif decoding.
 */
trait ExifTrait
{
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

    /**
     * xxx @todo
     */
    protected function parameterToString($val)
    {
        if ($val === 0) {
            return 'Normal';
        }
        if ($val > 0) {
            if ($val > 0xfff0) {    # a negative value in disguise?
                return $val - 0x10000;
            } else {
                return "+$val";
            }
        }
        return $val;
    }

    /**
     * xxx @todo
     */
    protected function fractionToString($val)
    {
        if (isset($val)) {
            $val *= 1.00001;    # avoid round-off errors
            if (!$val) {
                return '0';
            } elseif ((((int) $val) / $val) > 0.999) {
                return sprintf("%+d", (int) $val);
            } elseif (((int) ($val * 2)) / ($val * 2) > 0.999) {
                return sprintf("%+d/2", (int) ($val * 2));
            } elseif (((int) ($val * 3)) / ($val * 3) > 0.999) {
                return sprintf("%+d/3", (int) ($val * 3));
            } else {
                return sprintf("%+.3g", $val);
            }
        }
        return null;
    }

    /**
     * xxx @todo
     */
    protected function exposureTimeToString($val)
    {
        if ($val < 0.25001 and $val > 0) {
            return MediaProbe::fmt("1/%d", (int) (0.5 + 1 / $val));
        }
        return MediaProbe::fmt("%.1f", $val);
    }

    /**
     * xxx @todo
     */
    protected function timeZoneToString($min)
    {
        $sign = $min < 0 ? '-' : '+';
        $min = $min < 0 ? -$min : $min;
        $min = (int) ($min + 0.5); # round off to nearest minute
        $h = (int) ($min / 60);
        return sprintf('%s%02d:%02d', $sign, $h, $min - $h * 60);
    }
}
