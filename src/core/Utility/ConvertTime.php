<?php

namespace FileEye\ImageProbe\core\Utility;

/**
 * Conversion functions for time values.
 *
 * These methods are used for converting back and forth between the date
 * formats. They are used in preference to the ones from the PHP calendar
 * extension to avoid having to fiddle with timezones and to avoid depending
 * on the extension.
 *
 * @see http://www.hermetic.ch/cal_stud/jdn.htm#comp for a reference.
 */
abstract class ConvertTime
{
    /**
     * Converts a date in year/month/day format to a Julian Day count.
     *
     * @param int $year
     *            the year.
     * @param int $month
     *            the month, 1 to 12.
     * @param int $day
     *            the day in the month.
     *
     * @return int
     *            the Julian Day count.
     */
    public static function gregorianToJulianDay($year, $month, $day)
    {
        // Special case mapping 0/0/0 -> 0
        if ($year == 0 || $month == 0 || $day == 0) {
            return 0;
        }

        $m1412 = ($month <= 2) ? - 1 : 0;
        return floor((1461 * ($year + 4800 + $m1412)) / 4) + floor((367 * ($month - 2 - 12 * $m1412)) / 12) -
             floor((3 * floor(($year + 4900 + $m1412) / 100)) / 4) + $day - 32075;
    }

    /**
     * Converts a Julian Day count to a year/month/day triple.
     *
     * @param int
     *            the Julian Day count.
     *
     * @return array
     *            array with three entries: year, month, day.
     */
    public static function julianDayToGregorian($jd)
    {
        // Special case mapping 0 -> 0/0/0
        if ($jd == 0) {
            return [0, 0, 0];
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
        return [$y, $m, $d];
    }

    /**
     * Converts a UNIX timestamp to a Julian Day count.
     *
     * @param int $timestamp
     *            the timestamp.
     * @return int
     *            the Julian Day count.
     */
    public static function unixToJulianDay($timestamp)
    {
        return (int) (floor($timestamp / 86400) + 2440588);
    }

    /**
     * Converts a Julian Day count to a UNIX timestamp.
     *
     * @param int $jd
     *            the Julian Day count.
     *
     * @return mixed
     *            the integer timestamp or false if the day count cannot be
     *            represented as a UNIX timestamp.
     */
    public static function julianDayToUnix($jd)
    {
        if ($jd > 0) {
            $timestamp = ($jd - 2440588) * 86400;
            if ($timestamp >= 0) {
                return $timestamp;
            }
        }
        return false;
    }
}
