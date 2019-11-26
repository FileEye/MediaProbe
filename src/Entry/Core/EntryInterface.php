<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementInterface;

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
