<?php

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\DOMElement;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

/**
 * Base class for ElementInterface objects.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all MediaProbe
 * elements (Block and Entry objects).
 */
abstract class ElementBase implements ElementInterface, LoggerInterface
{
    use LoggerTrait;

    /**
     * The DOM node associated to this element.
     *
     * @var \DOMNode
     */
    protected $DOMNode;

    /**
     * The Xpath object associated to the root element.
     *
     * @todo xx only the root should have it
     *
     * @var \DOMXPath|null
     */
    protected $XPath;

    /**
     * Whether this element was successfully parsed from data.
     *
     * @var bool
     */
    protected $parsed = false;

    /**
     * Constructs an Element object.
     *
     * @param string $dom_node_name
     *            The name of the DOM node associated to this element.
     * @param \FileEye\MediaProbe\ElementInterface|null $parent
     *            (Optional) the parent element of this element.
     * @param \FileEye\MediaProbe\ElementInterface|null $reference
     *            (Optional) if specified, the new element will be inserted
     *            before the reference element.
     */
    public function __construct(string $dom_node_name, ElementInterface $parent = null, ElementInterface $reference = null)
    {
        // If $parent is null, this Element is the root of the DOM document that
        // stores the image structure.
        if (!$parent || !is_object($parent->DOMNode)) {
            $doc = new \DOMDocument();
            $doc->registerNodeClass('DOMElement', DOMElement::class);
            $this->XPath = new \DOMXPath($doc);
            $parent_node = $doc;
        } else {
            $doc = $parent->DOMNode->ownerDocument;
            $parent_node = $parent->DOMNode;
        }

        $this->DOMNode = $doc->createElement($dom_node_name);

        if ($reference) {
            $parent_node->insertBefore($this->DOMNode, $reference->DOMNode);
        } else {
            $parent_node->appendChild($this->DOMNode);
        }

        // Assign this Element as the payload of the DOM node.
        $this->DOMNode->setMediaProbeElement($this);
    }

    /**
     * {@inheritdoc}
     */
    public function getRootElement()
    {
        return $this->DOMNode->ownerDocument->documentElement->getMediaProbeElement();
    }

    /**
     * {@inheritdoc}
     */
    public function getParentElement()
    {
        return $this->DOMNode->getMediaProbeElement() !== $this->getRootElement() ? $this->DOMNode->parentNode->getMediaProbeElement() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getMultipleElements($expression)
    {
        $node_list = $this->getRootElement()->XPath->query($expression, $this->DOMNode);
        $ret = [];
        for ($i = 0; $i < $node_list->length; $i++) {
            $ret[] = $node_list->item($i)->getMediaProbeElement();
        }
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function getElement($expression)
    {
        $ret = $this->getMultipleElements($expression);
        switch (count($ret)) {
            case 0:
                return null;
            case 1:
                return $ret[0];
            default:
                throw new MediaProbeException("Multiple elements returned for '%s'", $expression);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeElement($expression)
    {
        $ret = $this->getMultipleElements($expression);
        switch (count($ret)) {
            case 0:
                return false;
            case 1:
                $ret[0]->DOMNode->parentNode->removeChild($ret[0]->DOMNode);
                return true;
            default:
                throw new MediaProbeException("Multiple elements exist for '%s', cannot remove from structure", $expression);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setAttribute($name, $value)
    {
        return $this->DOMNode->setAttribute($name, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        $attr = [];
        foreach ($this->DOMNode->attributes as $attribute) {
            $attr[$attribute->name] = $attribute->value;
        }
        return $attr;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttribute($name)
    {
        return $this->DOMNode->getAttribute($name);
    }

    /**
     * Returns the format of the context path segment.
     *
     * @returns string
     *   The format of the context path segment.
     */
    protected function getContextPathSegmentPattern()
    {
        return '/{DOMNode}';
    }

    /**
     * {@inheritdoc}
     */
    public function getContextPath()
    {
        // Get the path before this element.
        $parent_path = $this->getParentElement() ? $this->getParentElement()->getContextPath() : '';

        // Build the path fragment related to this node.
        $attributes = ['{DOMNode}' => $this->DOMNode->nodeName];
        if ($this->DOMNode->attributes->length) {
            foreach ($this->DOMNode->attributes as $attribute) {
                $attributes['{' . $attribute->name . '}'] = $attribute->value;
            }
        }

        return $parent_path . str_replace(array_keys($attributes), array_values($attributes), $this->getContextPathSegmentPattern());
    }

    /**
     * {@inheritdoc}
     */
    public function isParsed()
    {
        return $this->parsed;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        throw new MediaProbeException("%s does not implement the %s method.", get_called_class(), __FUNCTION__);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        throw new MediaProbeException("%s does not implement the %s method.", get_called_class(), __FUNCTION__);
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        return [
            'node' => $this->DOMNode->nodeName,
            'path' => $this->getContextPath(),
            'class' => get_class($this),
            'parsed' => $this->isParsed(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = []): void
    {
        $context['path'] = $this->getContextPath();
        $root_element = $this->getRootElement();
        if (property_exists($root_element, 'logger')) {  // xx should be logging anyway
            $root_element->logger->log($level, $message, $context);
            if ($root_element->externalLogger) {  // xx should be logging anyway
                $root_element->externalLogger->log($level, $message, $context);
            }
            if ($root_element->failLevel && Logger::toMonologLevel($level) >= $root_element->failLevel) {  // xx should be logging anyway
                throw new MediaProbeException($message);
            }
        }
    }
}
