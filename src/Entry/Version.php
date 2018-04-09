<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Entry\Exception\EntryException;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class to hold version information.
 */
class Version extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        $version = $data_window->getBytes($data_offset, $components);
        if (!is_numeric($version)) {
            throw new EntryException('Version data incorrect');
        }
        return [$version / 100];
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $version = isset($data[0]) ? $data[0] : 0.0;
        $major = floor($version);
        $minor = ($version - $major) * 100;
        $bytes = sprintf('%02.0f%02.0f', $major, $minor);

        $this->value[0] = (string) ($version . ($minor === 0.0 ? '.0' : ''));
        $this->components = strlen($bytes);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value[0];
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        $version = $this->getValue();
        $major = floor($version);
        $minor = ($version - $major) * 100;
        return sprintf('%02.0f%02.0f', $major, $minor);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $short = isset($options['short']) ? $options['short'] : false;
        if ($short) {
            return $this->getValue();
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
     * @param EntryInterface $entry
     *            the TAG EntryInterface object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeExifVersion($ifd_id, $tag_id, EntryInterface $entry, $brief = false)
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
     * @param EntryInterface $entry
     *            the TAG EntryInterface object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeFlashPixVersion($ifd_id, $tag_id, EntryInterface $entry, $brief = false)
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
     * @param EntryInterface $entry
     *            the TAG EntryInterface object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeInteroperabilityVersion($ifd_id, $tag_id, EntryInterface $entry, $brief = false)
    {
        if ($brief) {
            return ExifEye::fmt('%s', $entry->getValue());
        } else {
            return ExifEye::fmt('Interoperability Version %s', $entry->getValue());
        }
    }
}
