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
     * Gets the parent element of this element.
     *
     * @return \ExifEye\core\ElementInterface
     *            the parent element of this element.
     */
    public function getParentElement();

    /**
     * Returns the type of this element.
     *
     * @return string
     */
    public function getType();

    /**
     * Returns a context path for this element.
     *
     * It gives whereabouts of the element within the overall structure of the
     * image. Note that this is not an XPath compliant path, it is mainly used
     * for logging purposes.
     *
     * @return string
     */
    public function getContextPath();

    /**
     * Gets validity of the element.
     *
     * @return bool
     */
    public function isValid();

    /**
     * Returns a dump of the element in an array.
     *
     * @return array
     */
    public function toDumpArray();
}
