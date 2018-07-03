<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\DataWindow;

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
    public static function getInstanceArgumentsFromTagData(BlockBase $parent_block, $format, $components, DataWindow $data_window, $data_offset);

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
     * Sets the value of this entry.
     *
     * @param array
     *            the new value.
     *
     * @return $this
     */
    public function setValue(array $value);
}
