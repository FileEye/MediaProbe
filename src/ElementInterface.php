<?php

namespace ExifEye\core;

/**
 * Interface for Element objects.
 *
 * ExifEye Block and Entry objects all implement this interface.
 */
interface ElementInterface
{
    /**
     * Sets the parent element of this element.
     *
     * @param \ExifEye\core\ElementInterface $parent
     *            the parent element of this element.
     *
     * @return $this
     */
    public function setParentElement(ElementInterface $parent);

    /**
     * Gets the parent element of this element.
     *
     * @return \ExifEye\core\ElementInterface
     *            the parent element of this element.
     */
    public function getParentElement();

    /**
     * Gets validity of the element.
     *
     * @return bool
     */
    public function isValid();
}
