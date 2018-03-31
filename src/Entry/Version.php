<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Exception\UnexpectedFormatException;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;

/**
 * Class to hold version information.
 */
class Version extends Undefined
{
    protected $format = Format::UNDEFINED;

    protected $value = [];

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($ifd_id, $tag_id, $format, $components, DataWindow $data_window, $data_offset)
    {
        if ($format != Format::UNDEFINED) {
            throw new UnexpectedFormatException($ifd_id, $tag_id, $format, Format::UNDEFINED);
        }
        return [$data_window->getBytes($data_offset, $components) / 100];
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
dump($data);
        $version = isset($data[0]) ? $data[0] : 0.0;
        $major = floor($version);
        $minor = ($version - $major) * 100;
        $this->value[0] = $major . '.' . $minor;
        $strValue = sprintf('%02.0f%02.0f', $major, $minor);
        $this->components = strlen($strValue);
        $this->bytes = $strValue;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value[0];
    }

    /**
     * Validates a version string.
     *
     * @param string $value
     *            the string version.
     *
     * @return string
     *            the validated string version.
     */
    protected static function validateVersion($value)
    {
        return sprintf('%02.0f%02.0f', $value[0], $value[1]);
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
            return ExifEye::fmt('%s', $version);
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
            return ExifEye::fmt('%s', $version);
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
            return ExifEye::fmt('%s', $version);
        } else {
            return ExifEye::fmt('Interoperability Version %s', $version);
        }
    }
}
