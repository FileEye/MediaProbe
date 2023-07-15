<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Interface for Element objects.
 *
 * MediaProbe Block and Entry objects all implement this interface.
 */
interface ElementInterface
{
    /**
     * Gets the root ancestor element of this element.
     */
    public function getRootElement(): ElementInterface;

    /**
     * Gets the parent element of this element.
     */
    public function getParentElement(): ?ElementInterface;

    /**
     * Gets multiple children elements of this element.
     *
     * @param string $expression
     *            an XPath expression identifying the sub-elements to be selected.
     *
     * @return ElementInterface[]
     */
    public function getMultipleElements(string $expression): array;

    /**
     * Gets a single child element of this element.
     *
     * @param string $expression
     *            an XPath expression identifying the sub-element to be selected.
     *
     * @throws MediaProbeException
     *            when multiple elements fulfil the XPath expression.
     */
    public function getElement(string $expression): ?ElementInterface;

    /**
     * Removes a single child element of this element.
     *
     * @param string $expression
     *            an XPath expression identifying the sub-element to be removed.
     *
     * @return bool
     *            true if the element was removed, false if the element is not existing.
     *
     * @throws MediaProbeException
     *            when multiple elements fulfil the XPath expression.
     */
    public function removeElement(string $expression): bool;

    /**
     * Gets the DOM attributes associated to this element.
     *
     * @return string[]
     *            an associative array with the DOM attribute names as keys, and the DOM
     *            attribute values as values.
     */
    public function getAttributes(): array;

    /**
     * Gets the value of a DOM attribute associated to this element.
     *
     * @param string $name
     *            the name of the DOM attribute.
     *
     * @return string|null
     *            the DOM attribute value, or null if the attribute is not existing.
     */
    public function getAttribute(string $name): string;

    /**
     * Sets the value of a DOM attribute associated to this element.
     *
     * @param string $name
     *            the name of the DOM attribute.
     * @param string $value
     *            the value of the DOM attribute.
     */
    public function setAttribute(string $name, string $value): \DOMAttr|bool;

    /**
     * Returns a context path for this element.
     *
     * It gives whereabouts of the element within the overall structure of the image. Note
     * that this is not an XPath compliant path, it is mainly used for logging purposes.
     */
    public function getContextPath(): string;

    /**
     * Determines if the element has been parsed successfully from data.
     */
    public function isValid(): bool;

    /**
     * Returns the value of this element, if the element supports it.
     *
     * For a formatted version of the value, use ::toString() instead.
     *
     * @param array $options
     *            (Optional) an array of options to format the value.
     *
     * @throws MediaProbeException
     *            when the element does not support returning a value.
     */
    public function getValue(array $options = []): mixed;

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
     * @throws MediaProbeException
     *            when the element does not support returning a value.
     */
    public function toString(array $options = []): string;

    /**
     * Returns the bytes representing this element.
     *
     * The returned value may be a PHP string in case of a single sequence of
     * bytes, or an array in case multiple sequences are needed.
     *
     * @param int $byte_order
     *            (Optional) the byte order to use for numeric values, which
     *            must be either ConvertBytes::LITTLE_ENDIAN or
     *            ConvertBytes::BIG_ENDIAN.
     * @param int $offset
     *            (Optional) the offset at which the bytes will be appended.
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0): string;

    /**
     * Returns a dump of the element in an array.
     */
    public function toDumpArray(): array;
}
