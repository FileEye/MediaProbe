<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\EntryBase;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Utility\Convert;

/**
 * Class for holding unsigned shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts. The class will be used to manipulate any of the Exif
 * tags which has format {@link Format::SHORT} like in this
 * example:
 *
 * <code>
 * $w = $ifd->getEntry(PelTag::EXIF_IMAGE_WIDTH);
 * $w->setValue($w->getValue() / 2);
 * $h = $ifd->getEntry(PelTag::EXIF_IMAGE_HEIGHT);
 * $h->setValue($h->getValue() / 2);
 * </code>
 *
 * Here the width and height is updated to 50% of their original
 * values.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class Short extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::SHORT;

    /**
     * {@inheritdoc}
     */
    protected $min = 0;

    /**
     * {@inheritdoc}
     */
    protected $max = 65535;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getShort($data_offset + ($i * 2));
        }
        return $args;
    }

    /**
     * Convert a number into bytes.
     *
     * @param int $number
     *            the number that should be converted.
     *
     * @param boolean $order
     *            one of {@link Convert::LITTLE_ENDIAN} and
     *            {@link Convert::BIG_ENDIAN}, specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    public function numberToBytes($number, $order)
    {
        return Convert::shortToBytes($number, $order);
    }

    /**
     * Decode text for a IFD0/YCbCrSubSampling tag.
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
    public static function decodeYCbCrSubSampling($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        if ($entry->getValue()[0] == 2 && $entry->getValue()[1] == 1) {
            return 'YCbCr4:2:2';
        }
        if ($entry->getValue()[0] == 2 && $entry->getValue()[1] == 2) {
            return 'YCbCr4:2:0';
        }
        return $entry->getValue()[0] . ', ' . $entry->getValue()[1];
    }

    /**
     * Decode text for an Exif/SubjectArea tag.
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
    public static function decodeSubjectArea($ifd_id, $tag_id, EntryBase $entry, $brief = false)
    {
        switch ($entry->getComponents()) {
            case 2:
                return ExifEye::fmt('(x,y) = (%d,%d)', $entry->getValue()[0], $entry->getValue()[1]);
            case 3:
                return ExifEye::fmt('Within distance %d of (x,y) = (%d,%d)', $entry->getValue()[0], $entry->getValue()[1], $entry->getValue()[2]);
            case 4:
                return ExifEye::fmt('Within rectangle (width %d, height %d) around (x,y) = (%d,%d)', $entry->getValue()[0], $entry->getValue()[1], $entry->getValue()[2], $entry->getValue()[3]);
            default:
                return ExifEye::fmt('Unexpected number of components (%d, expected 2, 3, or 4).', $entry->getComponents());
        }
    }
}
