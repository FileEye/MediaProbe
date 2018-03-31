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
        $version = isset($data[0]) ? $data[0] : 0.0;
        $this->value[0] = (string) ($version . (floor($version) === $version ? '.0' : ''));
        $major = floor($version);
        $minor = ($version - $major) * 100;
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
     * {@inheritdoc}
     */
    public function getText($short = false)
    {
        if ($short) {
            return $entry->getValue();
        } else {
            return ExifEye::fmt('Version %s', $this->getValue());
        }
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
        if ($brief) {
            return ExifEye::fmt('%s', $entry->getValue());
        } else {
            return ExifEye::fmt('Exif Version %s', $entry->getValue());
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
        if ($brief) {
            return ExifEye::fmt('%s', $entry->getValue());
        } else {
            return ExifEye::fmt('FlashPix Version %s', $entry->getValue());
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
        if ($brief) {
            return ExifEye::fmt('%s', $entry->getValue());
        } else {
            return ExifEye::fmt('Interoperability Version %s', $entry->getValue());
        }
    }
}
