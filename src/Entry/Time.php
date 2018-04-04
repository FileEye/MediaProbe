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
 * This class can hold a timestamp, and it will be used as
 * in this example where the time is advanced by one week:
 * <code>
 * $entry = $ifd->getEntry(PelTag::DATE_TIME_ORIGINAL);
 * $time = $entry->getValue();
 * print('The image was taken on the ' . date('jS', $time));
 * $entry->setValue($time + 7 * 24 * 3600);
 * </code>
 *
 * The example used a standard UNIX timestamp, which is the default
 * for this class.
 *
 * But the Exif format defines dates outside the range of a UNIX
 * timestamp (about 1970 to 2038) and so you can also get access to
 * the timestamp in two other formats: a simple string or a Julian Day
 * Count. Please see the Calendar extension in the PHP Manual for more
 * information about the Julian Day Count.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
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
     * The Julian Day Count of the timestamp held by this entry.
     *
     * This is an integer counting the number of whole days since
     * January 1st, 4713 B.C. The fractional part of the timestamp held
     * by this entry is stored in {@link $seconds}.
     *
     * @var int
     */
    private $day_count;

    /**
     * The number of seconds into the day of the timestamp held by this
     * entry.
     *
     * The number of whole days is stored in {@link $day_count} and the
     * number of seconds left-over is stored here.
     *
     * @var int
     */
    private $seconds;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        // TODO: handle timezones.
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
        $type = isset($options['type']) ? $options['type'] : self::UNIX_TIMESTAMP;
        switch ($type) {
            case self::UNIX_TIMESTAMP:
                $seconds = ConvertTime::julianDayToUnix($this->day_count);
                if ($seconds === false) {
                    // We get false if the Julian Day Count is outside the range
                    // of a UNIX timestamp.
                    return false;
                } else {
                    return $seconds + $this->seconds;
                }
                break;
            case self::EXIF_STRING:
                list ($year, $month, $day) = ConvertTime::julianDayToGregorian($this->day_count);
                $hours = (int) ($this->seconds / 3600);
                $minutes = (int) ($this->seconds % 3600 / 60);
                $seconds = $this->seconds % 60;
                return sprintf('%04d:%02d:%02d %02d:%02d:%02d', $year, $month, $day, $hours, $minutes, $seconds);
            case self::JULIAN_DAY_COUNT:
                return $this->day_count + $this->seconds / 86400;
            default:
                throw new InvalidArgumentException(
                    'Expected UNIX_TIMESTAMP (%d), ' . 'EXIF_STRING (%d), or ' . 'JULIAN_DAY_COUNT (%d) for $type, got %d.',
                    self::UNIX_TIMESTAMP,
                    self::EXIF_STRING,
                    self::JULIAN_DAY_COUNT,
                    $type
                );
        }
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
        $type = isset($data[1]) ? $data[1] : self::UNIX_TIMESTAMP;
        switch ($type) {
            case self::UNIX_TIMESTAMP:
                $this->day_count = ConevrtTime::unixToJulianDay($timestamp);
                $this->seconds = $timestamp % 86400;
                break;

            case self::EXIF_STRING:
                // Clean the timestamp: some timestamps are broken other
                // separators than ':' and ' '.
                $d = preg_split('/[^0-9]+/', $timestamp);
                for ($i = 0; $i < 6; $i ++) {
                    if (empty($d[$i])) {
                        $d[$i] = 0;
                    }
                }
                $this->day_count = ConvertTime::gregorianToJulianDay($d[0], $d[1], $d[2]);
                $this->seconds = $d[3] * 3600 + $d[4] * 60 + $d[5];
                break;

            case self::JULIAN_DAY_COUNT:
                $this->day_count = (int) floor($timestamp);
                $this->seconds = (int) (86400 * ($timestamp - floor($timestamp)));
                break;

            default:
                throw new InvalidArgumentException(
                    'Expected UNIX_TIMESTAMP (%d), ' . 'EXIF_STRING (%d), or ' . 'JULIAN_DAY_COUNT (%d) for $type, got %d.',
                    self::UNIX_TIMESTAMP,
                    self::EXIF_STRING,
                    self::JULIAN_DAY_COUNT,
                    $type
                );
        }

        // Now finally update the string which will be used when this is
        // turned into bytes.
        parent::setValue([$this->getValue(['type' => self::EXIF_STRING])]);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue(['type' => self::EXIF_STRING]);
    }
}
