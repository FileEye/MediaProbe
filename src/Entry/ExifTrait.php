<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\MediaProbe;

/**
 * Common functions for Exif decoding.
 */
trait ExifTrait
{
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
}
