<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Directory Index tags.
 */
class CanonCITimestamp extends Long
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return date('Y-m-d h:i:s', $this->value[0]);

        $jd = (int) (floor($this->value[0] / 86400) + 2440588)

        if ($jd == 0) {
            return '0000:00:00 00:00:00';
        }

        $l = $jd + 68569;
        $n = floor((4 * $l) / 146097);
        $l = $l - floor((146097 * $n + 3) / 4);
        $i = floor((4000 * ($l + 1)) / 1461001);
        $l = $l - floor((1461 * $i) / 4) + 31;
        $j = floor((80 * $l) / 2447);
        $d = $l - floor((2447 * $j) / 80);
        $l = floor($j / 11);
        $m = $j + 2 - (12 * $l);
        $y = 100 * ($n - 49) + $i + $l;

        list ($year, $month, $day) = ConvertTime::julianDayToGregorian($day_count);
        $hours = (int) ($seconds_count / 3600);
        $minutes = (int) ($seconds_count % 3600 / 60);
        $day_count_to_seconds = $seconds_count % 60;
        return sprintf('%04d:%02d:%02d %02d:%02d:%02d', $y, $m, $d, $hours, $minutes, $day_count_to_seconds);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}
