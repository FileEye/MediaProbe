<?php

namespace FileEye\ImageInfo\core\Entry\Core;

use FileEye\ImageInfo\core\Block\BlockBase;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\ElementInterface;

/**
 * Interface for Entry objects.
 */
interface EntryInterface extends ElementInterface
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
