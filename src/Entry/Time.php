<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Format;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\InvalidArgumentException;
use ExifEye\core\Utility\ConvertTime;

/**
 * Class for holding a date and time.
 *
 * This class holds a timestamp as it is specifed by the EXIF specs. The
 * ::getValue and ::setValue methods can get/set value in different formats
 * like UNIX timestamp or Julian Day count.
 */
class Time extends Ascii
{
    /**
     * Constant denoting a UNIX timestamp.
     */
    const UNIX_TIMESTAMP = 1;

    /**
     * Constant denoting a Exif string.
     */
    const EXIF_STRING = 2;

    /**
     * Constant denoting a Julian Day Count.
     */
    const JULIAN_DAY_COUNT = 3;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        return [$data_window->getBytes($data_offset, $components - 1), static::EXIF_STRING];
    }

    /**
     * Return the timestamp of the entry.
     *
     * The timestamp held by this entry is returned in one of three
     * formats: as a standard UNIX timestamp (default), as a fractional
     * Julian Day Count, or as a string.
     *
     * @param integer $type
     *            the type of the timestamp. This must be one of
     *            {@link UNIX_TIMESTAMP}, {@link EXIF_STRING}, or
     *            {@link JULIAN_DAY_COUNT}.
     *
     * @return integer the timestamp held by this entry in the correct form
     *         as indicated by the type argument. For {@link UNIX_TIMESTAMP}
     *         this is an integer counting the number of seconds since January
     *         1st 1970, for {@link EXIF_STRING} this is a string of the form
     *         'YYYY:MM:DD hh:mm:ss', and for {@link JULIAN_DAY_COUNT} this is a
     *         floating point number where the integer part denotes the day
     *         count and the fractional part denotes the time of day (0.25 means
     *         6:00, 0.75 means 18:00).
     */
    public function getValue(array $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : self::EXIF_STRING;

        // Clean the timestamp: some timestamps are broken other
        // separators than ':' and ' '.
        $d = preg_split('/[^0-9]+/', $this->value[0]);
        for ($i = 0; $i < 6; $i ++) {
            if (empty($d[$i])) {
                $d[$i] = 0;
            }
        }
        $day_count = ConvertTime::gregorianToJulianDay($d[0], $d[1], $d[2]);
        $xseconds = $d[3] * 3600 + $d[4] * 60 + $d[5];

        switch ($type) {
            case self::UNIX_TIMESTAMP:
                $seconds = ConvertTime::julianDayToUnix($day_count);
                // We get false if the Julian Day Count is outside the range
                // of a UNIX timestamp.
                return $seconds !== false ? $seconds + $xseconds : false;
            case self::EXIF_STRING:
                list ($year, $month, $day) = ConvertTime::julianDayToGregorian($day_count);
                $hours = (int) ($xseconds / 3600);
                $minutes = (int) ($xseconds % 3600 / 60);
                $seconds = $xseconds % 60;
                return sprintf('%04d:%02d:%02d %02d:%02d:%02d', $year, $month, $day, $hours, $minutes, $seconds);
            case self::JULIAN_DAY_COUNT:
                return $day_count + $xseconds / 86400;
        }

        throw new InvalidArgumentException(
            'Expected UNIX_TIMESTAMP (%d), ' . 'EXIF_STRING (%d), or ' . 'JULIAN_DAY_COUNT (%d) for $type, got %d.',
            self::UNIX_TIMESTAMP,
            self::EXIF_STRING,
            self::JULIAN_DAY_COUNT,
            $type
        );
    }

    /**
     * Update the timestamp held by this entry.
     *
     * @param array $data
     *            key 0 - holds the timestamp held by this entry in the correct form
     *            as indicated by the third argument. For {@link UNIX_TIMESTAMP}
     *            this is an integer counting the number of seconds since January
     *            1st 1970, for {@link EXIF_STRING} this is a string of the form
     *            'YYYY:MM:DD hh:mm:ss', and for {@link JULIAN_DAY_COUNT} this is a
     *            floating point number where the integer part denotes the day
     *            count and the fractional part denotes the time of day (0.25 means
     *            6:00, 0.75 means 18:00).
     *            key 1 - holds the type of the timestamp. This must be one of
     *            {@link UNIX_TIMESTAMP}, {@link EXIF_STRING}, or
     *            {@link JULIAN_DAY_COUNT}.
     */
    public function setValue(array $data)
    {
        $timestamp = $data[0];
        $type = isset($data[1]) ? $data[1] : self::EXIF_STRING;
        switch ($type) {
            case self::UNIX_TIMESTAMP:
                $day_count = ConvertTime::unixToJulianDay($timestamp);
                $seconds = $timestamp % 86400;
                list ($year, $month, $day) = ConvertTime::julianDayToGregorian($day_count);
                $hours = (int) ($seconds / 3600);
                $minutes = (int) ($seconds % 3600 / 60);
                $seconds = $seconds % 60;
                parent::setValue([sprintf('%04d:%02d:%02d %02d:%02d:%02d', $year, $month, $day, $hours, $minutes, $seconds)]);
                break;
            case self::EXIF_STRING:
                parent::setValue([$timestamp]);
                break;
            case self::JULIAN_DAY_COUNT:
                $day_count = (int) floor($timestamp);
                $seconds = (int) (86400 * ($timestamp - floor($timestamp)));
                list ($year, $month, $day) = ConvertTime::julianDayToGregorian($day_count);
                $hours = (int) ($seconds / 3600);
                $minutes = (int) ($seconds % 3600 / 60);
                $seconds = $seconds % 60;
                parent::setValue([sprintf('%04d:%02d:%02d %02d:%02d:%02d', $year, $month, $day, $hours, $minutes, $seconds)]);
                break;
        }

        throw new InvalidArgumentException(
            'Expected UNIX_TIMESTAMP (%d), ' . 'EXIF_STRING (%d), or ' . 'JULIAN_DAY_COUNT (%d) for $type, got %d.',
            self::UNIX_TIMESTAMP,
            self::EXIF_STRING,
            self::JULIAN_DAY_COUNT,
            $type
        );
    }
}
