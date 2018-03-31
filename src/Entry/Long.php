<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Format;
use ExifEye\core\Utility\Convert;

/**
 * Class for holding unsigned longs.
 *
 * This class can hold longs, either just a single long or an array of
 * longs. The class will be used to manipulate any of the Exif tags
 * which can have format {@link Format::LONG} like in this
 * example:
 * <code>
 * $w = $ifd->getEntry(PelTag::EXIF_IMAGE_WIDTH);
 * $w->setValue($w->getValue() / 2);
 * $h = $ifd->getEntry(PelTag::EXIF_IMAGE_HEIGHT);
 * $h->setValue($h->getValue() / 2);
 * </code>
 * Here the width and height is updated to 50% of their original
 * values.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class Long extends NumberBase
{
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
    protected $format = Format::LONG;

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
    public static function xxGetInstanceArgumentsFromData($ifd_id, $tag_id, $format, $components, DataWindow $data, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data->getLong($i * 4);
        }
        return $args;
    }

    /**
     * Convert a number into bytes.
     *
     * @param
     *            int the number that should be converted.
     * @param
     *            PelByteOrder one of {@link Convert::LITTLE_ENDIAN} and
     *            {@link Convert::BIG_ENDIAN}, specifying the target byte order.
     *
     * @return string bytes representing the number given.
     */
    public function numberToBytes($number, $order)
    {
        return Convert::longToBytes($number, $order);
    }
}
