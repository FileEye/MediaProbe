<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\ConvertBytes;
use FileEye\MediaProbe\Utility\ConvertTime;

/**
 * Class for holding a date and time.
 *
 * This class holds a timestamp as it is specifed by the EXIF specs. The
 * ::getValue and ::setValue methods can get/set value in different formats
 * like UNIX timestamp or Julian Day count.
 */
class Time extends Ascii
{
    protected string $name = 'Time';

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

    protected function validateDataElement(): void
    {
        parent::validateDataElement();

        // This must be a string in the form 'YYYY:MM:DD hh:mm:ss'.
        $value = rtrim($this->dataElement->getBytes(), "\x00");

        // Clean the timestamp: some timestamps are broken and use other separators than ':' and ' ';
        // we just take the sequence of digits regardless of the in-betweens.
        $d = preg_split('/[^0-9]+/', $value);

        // We need to find 6 elements, year, month, day, hour, minutes, seconds.
        if (count($d) !== 6) {
            $this->warning("Invalid datetime format for '{value}'", ['value' => $value]);
            $this->valid = false;
        } else {
            for ($i = 0; $i < 6; $i ++) {
                // If any of year, month, day, hour, minutes, seconds are 0, the timestamp is invalid.
                if (empty($d[$i])) {
                    $this->warning("Invalid datetime '{value}'", ['value' => $value]);
                    $this->valid = false;
                    break;
                }
            }
        }
    }

    /**
     * Return the timestamp of the entry.
     *
     * The timestamp held by this entry is returned in one of three formats: as a string according
     * to EXIF specs (default), as a standard UNIX timestamp, or as a fractional Julian Day Count.
     *
     * @param array $options
     *   (Optional) an array of options to format the value.
     *
     * @return mixed 
     *   The timestamp held by this entry in the correct form as indicated by the 'type' option.
     *   For UNIX_TIMESTAMP this is an integer counting the number of seconds since January 1st
     *   1970, for EXIF_STRING this is a string of the form 'YYYY:MM:DD hh:mm:ss', and for
     *   JULIAN_DAY_COUNT this is a floating point number where the integer part denotes the day
     *   count and the fractional part denotes the time of day (0.25 means 6:00, 0.75 means 18:00).
     */
    public function getValue(array $options = []): mixed
    {
        $value = rtrim($this->dataElement->getBytes(), "\x00");

        $format = $options['format'] ?? null;
        $type = $options['type'] ?? self::EXIF_STRING;

        if (!in_array($type, [self::UNIX_TIMESTAMP, self::EXIF_STRING, self::JULIAN_DAY_COUNT])) {
            $this->error('Expected UNIX_TIMESTAMP, EXIF_STRING, or JULIAN_DAY_COUNT for \'type\', got {type}.', [
                'type' => $type,
            ]);
            return false;
        }

        if (in_array($format, ['phpExif', 'exiftool'])) {
            return $value;
        }

        // Clean the timestamp: some timestamps are broken other
        // separators than ':' and ' '.
        $d = preg_split('/[^0-9]+/', $value);
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
                        'timestamp' => $value,
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
        throw new MediaProbeException(sprintf('Invalid time type %d', $type));
    }
}
