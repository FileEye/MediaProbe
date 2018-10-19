<?php

namespace ExifEye\core;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Interface for Element objects.
 *
 * ExifEye Block and Entry objects all implement this interface.
 */
interface ElementInterface
{
    /**
     * Returns the type of this element.
     *
     * @return string
     */
    public function getType();

    /**
     * Gets the root ancestor element of this element.
     *
     * @return \ExifEye\core\ElementInterface
     *            the root ancestor element of this element.
     */
    public function getRootElement();

    /**
     * Gets the parent element of this element.
     *
     * @return \ExifEye\core\ElementInterface
     *            the parent element of this element.
     */
    public function getParentElement();

    /**
     * Gets multiple children elements of this element.
     *
     * @param string $expression
     *            an XPath expression identifying the sub-elements to be selected.
     *
     * @return \ExifEye\core\ElementInterface[]
     *            the selected children elements of this element.
     */
    public function getMultipleElements($expression);

    /**
     * Gets a single child element of this element.
     *
     * @param string $expression
     *            an XPath expression identifying the sub-element to be selected.
     *
     * @return \ExifEye\core\ElementInterface
     *            the selected child elements of this element.
     *
     * @throws \ExifEye\core\ExifEyeException
     *            when multiple elements fulfil the XPath expression.
     */
    public function getElement($expression);

    /**
     * Removes a single child element of this element.
     *
     * @param string $expression
     *            an XPath expression identifying the sub-element to be removed.
     *
     * @return bool
     *            true if the element was removed, false if the element is not existing.
     *
     * @throws \ExifEye\core\ExifEyeException
     *            when multiple elements fulfil the XPath expression.
     */
    public function removeElement($expression);

    /**
     * Gets the DOM attributes associated to this element.
     *
     * @return string[]
     *            an associative array with the DOM attribute names as keys, and the DOM
     *            attribute values as values.
     */
    public function getAttributes();

    /**
     * Gets the value of a DOM attribute associated to this element.
     *
     * @param string $name
     *            the name of the DOM attribute.
     *
     * @return string|null
     *            the DOM attribute value, or null if the attribute is not existing.
     */
    public function getAttribute($name);

    /**
     * Sets the value of a DOM attribute associated to this element.
     *
     * @param string $name
     *            the name of the DOM attribute.
     * @param string $value
     *            the value of the DOM attribute.
     */
    public function setAttribute($name, $value);

    /**
     * Returns a context path for this element.
     *
     * It gives whereabouts of the element within the overall structure of the image. Note
     * that this is not an XPath compliant path, it is mainly used for logging purposes.
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
     * Returns the value of this element, if the element supports it.
     *
     * For a formatted version of the value, use ::toString() instead.
     *
     * @param array $options
     *            (Optional) an array of options to format the value.
     *
     * @return mixed
     *
     * @throws \ExifEye\core\ExifEyeException
     *            when the element does not support returning a value.
     */
    public function getValue(array $options = []);

    /**
     * Loads data into an element.
     *
     * @param DataElement $data_element
     *            the data element that will provide the data.
     * @param int $offset
     *            (Optional) the offset within the data element where the
     *            block will be found.
     * @param int|null $size
     *            (Optional) the size of the data from the offset.
     * @param array $options
     *            (Optional) an array with additional options for the load.
     *
     * @returns ElementInterface
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = []);

    /**
     * Gets the value of this element as text.
     *
     * The value will be returned in a format suitable for presentation, e.g. rationals will
     * be returned as 'x/y', ASCII strings will be returned as themselves, undefined
     * sequences of bytes as themselves etc.
     *
     * @param array $options
     *            (Optional) an array of options to format the value.
     *
     * @return string
     *
     * @throws \ExifEye\core\ExifEyeException
     *            when the element does not support returning a value.
     */
    public function toString(array $options = []);

    /**
     * Returns the bytes representing this element.
     *
     * The returned value may be a PHP string in case of a single sequence of
     * bytes, or an array in case multiple sequences are needed.
     *
     * @param bool $byte_order
     *            (Optional) the byte order to use for numeric values, which
     *            must be either ConvertBytes::LITTLE_ENDIAN or
     *            ConvertBytes::BIG_ENDIAN.
     * @param int $offset
     *            (Optional) the offset at which the bytes will be appended.
     *
     * @return string|string[]
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0);

    /**
     * Returns a dump of the element in an array.
     *
     * @return array
     */
    public function toDumpArray();
}
