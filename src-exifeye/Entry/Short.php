<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
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
     * Make a new entry that can hold an unsigned short.
     *
     * The method accept several integer arguments. The {@link
     * getValue} method will always return an array except for when a
     * single integer argument is given here.
     *
     * This means that one can conveniently use objects like this:
     * <code>
     * $a = new Short(PelTag::EXIF_IMAGE_HEIGHT, 42);
     * $b = $a->getValue() + 314;
     * </code>
     * where the call to {@link getValue} will return an integer
     * instead of an array with one integer element, which would then
     * have to be extracted.
     *
     * @param int $tag
     *            the tag which this entry represents. This should be
     *            one of the constants defined in {@link PelTag}, e.g., {@link
     *            PelTag::IMAGE_WIDTH}, {@link PelTag::ISO_SPEED_RATINGS},
     *            or any other tag with format {@link Format::SHORT}.
     * @param int $value...
     *            the short(s) that this entry will
     *            represent. The argument passed must obey the same rules as the
     *            argument to {@link setValue}, namely that it should be within
     *            range of an unsigned short, that is between 0 and 65535
     *            (inclusive). If not, then a {@link PelOverFlowException} will be
     *            thrown.
     */
    public function __construct($tag, $value = null)
    {
        $this->tag = $tag;
        $this->min = 0;
        $this->max = 65535;
        $this->format = Format::SHORT;

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
     * @return array a list or arguments to be passed to the PelEntry subclass
     *            constructor.
     */
    public static function getInstanceArgumentsFromData($ifd_id, $tag_id, $format, $components, DataWindow $data, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data->getShort($i * 2);
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
     * @param PelEntry $entry
     *            the TAG PelEntry object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeYCbCrSubSampling(PelEntry $entry, $brief = false)
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
     * @param PelEntry $entry
     *            the TAG PelEntry object.
     * @param bool $brief
     *            (Optional) indicates to use brief output.
     *
     * @return string
     *            the TAG text.
     */
    public static function decodeSubjectArea(PelEntry $entry, $brief = false)
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
