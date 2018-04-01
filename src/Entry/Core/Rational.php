<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;

/**
 * Class for holding unsigned rational numbers.
 *
 * This class can hold rational numbers, consisting of a numerator and
 * denominator both of which are of type unsigned long. Each rational
 * is represented by an array with just two entries: the numerator and
 * the denominator, in that order.
 *
 * The class can hold either just a single rational or an array of
 * rationals. The class will be used to manipulate any of the Exif
 * tags which can have format {@link Format::RATIONAL} like in this
 * example:
 *
 * <code>
 * $resolution = $ifd->getEntry(PelTag::X_RESOLUTION);
 * $resolution->setValue([1, 300]);
 * </code>
 *
 * Here the x-resolution is adjusted to 1/300, which will be 300 DPI,
 * unless the {@link PelTag::RESOLUTION_UNIT resolution unit} is set
 * to something different than 2 which means inches.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class Rational extends Long
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::RATIONAL;

    /**
     * {@inheritdoc}
     */
    protected $dimension = 2;

    /**
     * {@inheritdoc}
     */
    protected $min = 0;

    /**
     * {@inheritdoc}
     */
    protected $max = 4294967295;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($ifd_id, $tag_id, $format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getRational($data_offset + ($i * 8));
        }
        return $args;
    }

    /**
     * Format a rational number.
     *
     * The rational will be returned as a string with a slash '/'
     * between the numerator and denominator.
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
        return $number[0] . '/' . $number[1];
    }

    /**
     * Decode text for an Exif/FNumber tag.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeFNumber($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        return ExifEye::fmt('f/%.01f', $entry->getValue()[0] / $entry->getValue()[1]);
    }

    /**
     * Decode text for an Exif/ApertureValue tag.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeApertureValue($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        return ExifEye::fmt('f/%.01f', pow(2, $entry->getValue()[0] / $entry->getValue()[1] / 2));
    }

    /**
     * Decode text for an Exif/FocalLength tag.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeFocalLength($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        return ExifEye::fmt('%.1f mm', $entry->getValue()[0] / $entry->getValue()[1]);
    }

    /**
     * Decode text for an Exif/SubjectDistance tag.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeSubjectDistance($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        return ExifEye::fmt('%.1f m', $entry->getValue()[0] / $entry->getValue()[1]);
    }

    /**
     * Decode text for an Exif/ExposureTime tag.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeExposureTime($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        if ($entry->getValue()[0] / $entry->getValue()[1] < 1) {
            return ExifEye::fmt('1/%d sec.', $entry->getValue()[1] / $entry->getValue()[0]);
        } else {
            return ExifEye::fmt('%d sec.', $entry->getValue()[0] / $entry->getValue()[1]);
        }
    }

    /**
     * Return a string formatting LONG/LAT degrees.
     *
     * @param array $value
     *            the value as array of int.
     *
     * @return string
     *            the TAG text.
     */
    private static function formatDegrees($value)
    {
        $degrees = $value[0][0] / $value[0][1];
        $minutes = $value[1][0] / $value[1][1];
        $seconds = $value[2][0] / $value[2][1];
        return sprintf('%s° %s\' %s" (%.2f°)', $degrees, $minutes, $seconds, $degrees + $minutes / 60 + $seconds / 3600);
    }

    /**
     * Decode text for a GPS/GPSLongitude tag.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeGPSLongitude($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        return static::formatDegrees($entry->getValue());
    }

    /**
     * Decode text for a GPS/GPSLatitude tag.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param EntryBase $entry
     *            the TAG EntryBase object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeGPSLatitude($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        return static::formatDegrees($entry->getValue());
    }
}
