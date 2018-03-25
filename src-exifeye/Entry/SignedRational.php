<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;

/**
 * Class for holding signed rational numbers.
 *
 * This class can hold rational numbers, consisting of a numerator and
 * denominator both of which are of type unsigned long. Each rational
 * is represented by an array with just two entries: the numerator and
 * the denominator, in that order.
 *
 * The class can hold either just a single rational or an array of
 * rationals. The class will be used to manipulate any of the Exif
 * tags which can have format {@link Format::SRATIONAL}.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class SignedRational extends SignedLong
{
    /**
     * Make a new entry that can hold a signed rational.
     *
     * @param
     *            int the tag which this entry represents. This should
     *            be one of the constants defined in {@link PelTag}, e.g., {@link
     *            PelTag::SHUTTER_SPEED_VALUE}, or any other tag which can have
     *            format {@link Format::SRATIONAL}.
     * @param array $value...
     *            the rational(s) that this entry will
     *            represent. The arguments passed must obey the same rules as the
     *            argument to {@link setValue}, namely that each argument should be
     *            an array with two entries, both of which must be within range of
     *            a signed long (32 bit), that is between -2147483648 and
     *            2147483647 (inclusive). If not, then a {@link
     *            PelOverflowException} will be thrown.
     */
    public function __construct($tag, $value = null)
    {
        $this->tag = $tag;
        $this->format = Format::SRATIONAL;
        $this->dimension = 2;
        $this->min = - 2147483648;
        $this->max = 2147483647;

        $value = func_get_args();
        array_shift($value);
        $this->setValueArray($value);
    }

    /**
     * Get arguments for the instance constructor from file data.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param int $format
     *            the format of the entry as defined in {@link Format}.
     * @param int $components
     *            the components in the entry.
     * @param DataWindow $data
     *            the data which will be used to construct the entry.
     * @param int $data_offset
     *            the offset of the main DataWindow where data is stored.
     *
     * @return array a list or arguments to be passed to the EntryBase subclass
     *            constructor.
     */
    public static function getInstanceArgumentsFromData($ifd_id, $tag_id, $format, $components, DataWindow $data, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data->getSRational($i * 8);
        }
        return $args;
    }

    /**
     * Format a rational number.
     *
     * The rational will be returned as a string with a slash '/'
     * between the numerator and denominator. Care is taken to display
     * '-1/2' instead of the ugly but mathematically equivalent '1/-2'.
     *
     * @param
     *            array the rational which will be formatted.
     *
     * @param
     *            boolean not used.
     *
     * @return string the rational formatted as a string suitable for
     *         display.
     */
    public function formatNumber($number, $brief = false)
    {
        if ($number[1] < 0) {
            /* Turn output like 1/-2 into -1/2. */
            return (- $number[0]) . '/' . (- $number[1]);
        } else {
            return $number[0] . '/' . $number[1];
        }
    }

    /**
     * Decode text for an Exif/ShutterSpeedValue tag.
     *
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeShutterSpeedValue(EntryBase $entry, $brief = false)
    {
        return ExifEye::fmt('%.0f/%.0f sec. (APEX: %d)', $entry->getValue()[0], $entry->getValue()[1], pow(sqrt(2), $entry->getValue()[0] / $entry->getValue()[1]));
    }

    /**
     * Decode text for an Exif/BrightnessValue tag.
     *
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeBrightnessValue(EntryBase $entry, $brief = false)
    {
        // TODO: figure out the APEX thing, or remove this so that it is
        // handled by the default code.
        return sprintf('%d/%d', $entry->getValue()[0], $entry->getValue()[1]);
        // FIXME: How do I calculate the APEX value?
    }

    /**
     * Decode text for an Exif/ExposureBiasValue tag.
     *
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeExposureBiasValue(EntryBase $entry, $brief = false)
    {
        return sprintf('%s%.01f', $entry->getValue()[0] * $entry->getValue()[1] > 0 ? '+' : '', $entry->getValue()[0] / $entry->getValue()[1]);
    }
}