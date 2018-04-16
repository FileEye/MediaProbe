<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\DataWindow;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Interface for Entry objects.
 */
interface EntryInterface
{
    /**
     * Get arguments for the instance constructor from raw TAG data.
     *
     * @param int $format
     *            the format of the entry.
     * @param int $components
     *            the components in the entry.
     * @param DataWindow $data
     *            the data which will be used to construct the entry.
     * @param int $data_offset
     *            the offset of the main DataWindow where data is stored.
     *
     * @return array a list or arguments to be passed to the EntryInterface
     *            subclass constructor.
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset);

    /**
     * Sets the parent block of this entry.
     *
     * @param BlockBase
     *            the parent block.
     *
     * @return $this
     */
    public function setParentBlock(BlockBase $parent_block = null);

    /**
     * Returns the format of this entry.
     *
     * @return int
     */
    public function getFormat();

    /**
     * Returns the number of components of this entry.
     *
     * @return int
     */
    public function getComponents();

    /**
     * Gets validity of the entry.
     *
     * @return bool
     */
    public function isValid();

    /**
     * Sets the value of this entry.
     *
     * @param array
     *            the new value.
     *
     * @return $this
     */
    public function setValue(array $value);

    /**
     * Returns the value of this entry.
     *
     * The value returned will generally be the same as the one supplied to the
     * constructor or with ::setValue(). For a formatted version of the value,
     * use ::toString() instead.
     *
     * @param array $options
     *            (optional) an array of options to format the value.
     *
     * @return mixed
     */
    public function getValue(array $options = []);

    /**
     * Returns the bytes representing this entry.
     *
     * @param bool $byte_order
     *            the byte order to use for numeric values, which must be either
     *            ConvertBytes::LITTLE_ENDIAN or ConvertBytes::BIG_ENDIAN.
     *
     * @return string
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN);

    /**
     * Gets the value of this entry as text.
     *
     * The value will be returned in a format suitable for presentation, e.g.
     * rationals will be returned as 'x/y', ASCII strings will be returned as
     * themselves etc.
     *
     * @param array $options
     *            (optional) an array of options to format the value.
     *
     * @return string
     */
    public function toString(array $options = []);
}
