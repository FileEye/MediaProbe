<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataWindow;

/**
 * Interface for Entry objects.
 */
interface EntryInterface
{
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
