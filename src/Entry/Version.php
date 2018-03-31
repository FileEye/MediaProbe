<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Exception\UnexpectedFormatException;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;

/**
 * Class to hold version information.
 */
class Version
{
    protected static function validateVersion($value)
    {
        $version = ((int) $value) / 100;
        $major = floor($version);
        $minor = ($version - $major) * 100;
        $value = sprintf('%02.0f%02.0f', $major, $minor);
        return $value;
    }

    /**
     * Decode text for an Exif/ExifVersion tag.
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
    public static function decodeExifVersion($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        $version = static::validateVersion($entry->getValue());
        if ($brief) {
            return ExifEye::fmt('Exif %s', $version);
        } else {
            return ExifEye::fmt('Exif Version %s', $version);
        }
    }

    /**
     * Decode text for an Exif/FlashPixVersion tag.
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
    public static function decodeFlashPixVersion($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        $version = static::validateVersion($entry->getValue());
        if ($brief) {
            return ExifEye::fmt('FlashPix %s', $version);
        } else {
            return ExifEye::fmt('FlashPix Version %s', $version);
        }
    }

    /**
     * Decode text for an Interoperability/InteroperabilityVersion tag.
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
    public static function decodeInteroperabilityVersion($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        $version = static::validateVersion($entry->getValue());
        if ($brief) {
            return ExifEye::fmt('Interoperability %s', $version);
        } else {
            return ExifEye::fmt('Interoperability Version %s', $version);
        }
    }
}
