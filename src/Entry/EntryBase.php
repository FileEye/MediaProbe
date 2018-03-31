<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;
use ExifEye\core\Spec;

/**
 * Common ancestor class of all {@link Ifd} entries.
 *
 * As this class is abstract you cannot instantiate objects from it.
 * It only serves as a common ancestor to define the methods common to
 * all entries. The most important methods are {@link getValue()} and
 * {@link setValue()}, both of which is abstract in this class. The
 * descendants will give concrete implementations for them.
 *
 * If you have some data coming from an image (some raw bytes), then
 * the static method {@link newFromData()} is helpful --- it will look
 * at the data and give you a proper decendent of {@link EntryBase}
 * back.
 *
 * If you instead want to have an entry for some data which take the
 * form of an integer, a string, a byte, or some other PHP type, then
 * don't use this class. You should instead create an object of the
 * right subclass ({@link Short} for short integers, {@link
 * Ascii} for strings, and so on) directly.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
abstract class EntryBase
{
    /**
     * The bytes representing this entry.
     *
     * Subclasses must either override {@link getBytes()} or, if
     * possible, maintain this property so that it always contains a
     * true representation of the entry.
     *
     * @var string
     */
    protected $bytes = '';

    /**
     * The {@link Format} of this entry.
     *
     * @var int
     */
    protected $format;

    /**
     * The number of components of this entry.
     *
     * @var int
     */
    protected $components;

    /**
     * Constructs an EntryInterface object.
     *
     * @param integer $block_id
     *            The ID of the block containing this entry.
     * @param integer $entry_id
     *            The ID of the entry.
     * @param array $data
     *            the data that this entry will be holding.
     */
    public function __construct(array $data)
    {
        $this->setValue($data);
    }

    /**
     * Creates a new EntryBase of the required subclass.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param array $arguments
     *            a list or arguments to be passed to the EntryBase subclass
     *            constructor.
     *
     * @return EntryBase a newly created entry, holding the data given.
     */
    final public static function createNew($ifd_id, $tag_id, array $arguments)
    {
        $class = Spec::getTagClass($ifd_id, $tag_id);
        return new $class($arguments);
    }

    /**
     * Get arguments for the instance constructor from raw data.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param int $format
     *            the format of the entry.
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
    public static function getInstanceArgumentsFromData($ifd_id, $tag_id, $format, $components, DataWindow $data_window, $data_offset)
    {
        throw new ExifEyeException('getInstanceArgumentsFromData() must be implemented.');
    }

    /**
     * Return the format of this entry.
     *
     * @return int the format of this entry.
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Return the number of components of this entry.
     *
     * @return int the number of components of this entry.
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Turn this entry into bytes.
     *
     * @param
     *            PelByteOrder the desired byte order, which must be either
     *            {@link Convert::LITTLE_ENDIAN} or {@link Convert::BIG_ENDIAN}.
     *
     * @return string bytes representing this entry.
     */
    public function getBytes($o)
    {
        return $this->bytes;
    }

    /**
     * Get the value of this entry as text.
     *
     * The value will be returned in a format suitable for presentation,
     * e.g., rationals will be returned as 'x/y', ASCII strings will be
     * returned as themselves etc.
     *
     * @param
     *            boolean some values can be returned in a long or more
     *            brief form, and this parameter controls that.
     *
     * @return string the value as text.
     */
    public function getText($brief = false)
    {
        // @todo xx
    }

    /**
     * Get the value of this entry.
     *
     * The value returned will generally be the same as the one supplied
     * to the constructor or with {@link setValue()}. For a formatted
     * version of the value, one should use {@link getText()} instead.
     *
     * @return mixed the unformatted value.
     */
    abstract public function getValue();

    /**
     * Set the value of this entry.
     *
     * @param array
     *            the new value.
     */
    abstract public function setValue(array $value);

    /**
     * Turn this entry into a string.
     *
     * @return string a string representation of this entry. This is
     *         mostly for debugging.
     */
    public function __toString()
    {
        $str = ExifEye::fmt("    Format    : %d (%s)\n", $this->format, Format::getName($this->format));
        $str .= ExifEye::fmt("    Components: %d\n", $this->components);
        return $str;
    }
}
