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
     * Returns the type of this element.
     *
     * @return string
     */
    public function getType();

    /**
     * Returns the id of this element.
     *
     * @return int
     */
    public function getId();

    /**
     * Returns the name of this element.
     *
     * @return string
     */
    public function getName();

    /**
     * Returns the full path of this element.
     *
     * @return string
     */
    public function getPath();

    /**
     * Returns the path fragment of this element.
     *
     * @return string
     */
    public function getElementPathFragment();

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
