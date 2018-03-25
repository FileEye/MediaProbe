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
     * Make a new entry that can hold an unsigned long.
     *
     * The method accept its arguments in two forms: several integer
     * arguments or a single array argument. The {@link getValue}
     * method will always return an array except for when a single
     * integer argument is given here, or when an array with just a
     * single integer is given.
     *
     * This means that one can conveniently use objects like this:
     * <code>
     * $a = new Long(PelTag::EXIF_IMAGE_WIDTH, 123456);
     * $b = $a->getValue() - 654321;
     * </code>
     * where the call to {@link getValue} will return an integer instead
     * of an array with one integer element, which would then have to be
     * extracted.
     *
     * @param
     *            int the tag which this entry represents. This
     *            should be one of the constants defined in {@link PelTag},
     *            e.g., {@link PelTag::IMAGE_WIDTH}, or any other tag which can
     *            have format {@link Format::LONG}.
     * @param int $value...
     *            the long(s) that this entry will
     *            represent or an array of longs. The argument passed must obey
     *            the same rules as the argument to {@link setValue}, namely that
     *            it should be within range of an unsigned long (32 bit), that is
     *            between 0 and 4294967295 (inclusive). If not, then a {@link
     *            PelExifOverflowException} will be thrown.
     */
    public function __construct($tag, $value = null)
    {
        $this->tag = $tag;
        $this->min = 0;
        $this->max = 4294967295;
        $this->format = Format::LONG;

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
