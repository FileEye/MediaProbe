<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
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
     * {@inheritdoc}
     */
    protected $name = 'Time';

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
     * Return the timestamp of the entry.
     *
     * The timestamp held by this entry is returned in one of three formats:
     * as a string according to EXIF specs (default), as a standard UNIX
     * timestamp, or as a fractional Julian Day Count.
     *
     * @param array
     *            (optional) an array of options to format the value.
     *
     * @return mixed the timestamp held by this entry in the correct form as
     *         indicated by the 'type' option. For UNIX_TIMESTAMP this is an
     *         integer counting the number of seconds since January 1st 1970,
     *         for EXIF_STRING this is a string of the form
     *         'YYYY:MM:DD hh:mm:ss', and for JULIAN_DAY_COUNT this is a
     *         floating point number where the integer part denotes the day
     *         count and the fractional part denotes the time of day (0.25
     *         means 6:00, 0.75 means 18:00).
     */
    public function getValue(array $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : self::EXIF_STRING;

        if (!in_array($type, [self::UNIX_TIMESTAMP, self::EXIF_STRING, self::JULIAN_DAY_COUNT])) {
            $this->error('Expected UNIX_TIMESTAMP, EXIF_STRING, or JULIAN_DAY_COUNT for \'type\', got {type}.', [
                'type' => $type,
            ]);
            return false;
        }

        // Clean the timestamp: some timestamps are broken other
        // separators than ':' and ' '.
        $d = preg_split('/[^0-9]+/', $this->value);
        for ($i = 0; $i < 6; $i ++) {
            if (empty($d[$i])) {
                $d[$i] = 0;
            }
        }
        $day_count = ConvertTime::gregorianToJulianDay($d[0], $d[1], $d[2]);
        $seconds_count = $d[3] * 3600 + $d[4] * 60 + $d[5];

        switch ($type) {
            case self::UNIX_TIMESTAMP:
                $day_count_to_seconds = ConvertTime::julianDayToUnix($day_count);
                // We get false if the Julian Day Count is outside the range
                // of a UNIX timestamp.
                if ($day_count_to_seconds === false) {
                    $this->error('Cannot convert timestamp {timestamp} to UNIX format', [
                        'timestamp' => $this->value,
                    ]);
                    return false;
                }
                return $day_count_to_seconds + $seconds_count;
            case self::EXIF_STRING:
                list ($year, $month, $day) = ConvertTime::julianDayToGregorian($day_count);
                $hours = (int) ($seconds_count / 3600);
                $minutes = (int) ($seconds_count % 3600 / 60);
                $day_count_to_seconds = $seconds_count % 60;
                return sprintf('%04d:%02d:%02d %02d:%02d:%02d', $year, $month, $day, $hours, $minutes, $day_count_to_seconds);
            case self::JULIAN_DAY_COUNT:
                return $day_count + $seconds_count / 86400;
        }
    }

    /**
     * Update the timestamp held by this entry.
     *
     * @param array $data
     *            key 0 - holds the timestamp held by this entry in the correct
     *            form as indicated by the second array element.
     *            key 1 - the type of timestamp. For UNIX_TIMESTAMP this is an
     *            integer counting the number of seconds since January 1st
     *            1970, for EXIF_STRING this is a string of the form
     *            'YYYY:MM:DD hh:mm:ss', and for JULIAN_DAY_COUNT this is a
     *            floating point number where the integer part denotes the day
     *            count and the fractional part denotes the time of day (0.25
     *            means 6:00, 0.75 means 18:00).
     */
    public function setValue(array $data)
    {
        $type = isset($data[1]) ? $data[1] : self::EXIF_STRING;

        if (!in_array($type, [self::UNIX_TIMESTAMP, self::EXIF_STRING, self::JULIAN_DAY_COUNT])) {
            $this->error('Expected UNIX_TIMESTAMP, EXIF_STRING, or JULIAN_DAY_COUNT for \'type\', got {type}.', [
                'type' => $type,
            ]);
            $this->valid = false;
        }

        switch ($type) {
            case self::UNIX_TIMESTAMP:
                $day_count = ConvertTime::unixToJulianDay($data[0]);
                $seconds = $data[0] % 86400;
                break;
            case self::JULIAN_DAY_COUNT:
                $day_count = (int) floor($data[0]);
                $seconds = (int) (86400 * ($data[0] - floor($data[0])));
                break;
            case self::EXIF_STRING:
            default:
                $value = $data[0];
                break;
        }

        if (isset($day_count)) {
            list ($year, $month, $day) = ConvertTime::julianDayToGregorian($day_count);
            $hours = (int) ($seconds / 3600);
            $minutes = (int) ($seconds % 3600 / 60);
            $seconds = $seconds % 60;
            $value = sprintf('%04d:%02d:%02d %02d:%02d:%02d', $year, $month, $day, $hours, $minutes, $seconds);
        }

        return parent::setValue([$value]);
    }
}
