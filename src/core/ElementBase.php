<?php

namespace ExifEye\core;

use ExifEye\core\DOM\ExifEyeDOMElement;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Monolog\Logger;

/**
 * Base class for ElementInterface objects.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all ExifEye
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
     * The name of the DOM node associated to this element.
     *
     * @var string
     */
    protected $DOMNodeName;

    /**
     * The Xpath object associated to the root element.
     *
     * @var \DOMXPath|null
     */
    protected $XPath;

    /**
     * The type of this element.
     *
     * @var string
     */
    protected $type;

    /**
     * Whether this element is valid.
     *
     * @var bool
     */
    protected $valid = true;

    /**
     * Constructs an Element object.
     *
     * @param string $type
     *            The type of this element.
     * @param \ExifEye\core\ElementInterface|null $parent
     *            (Optional) the parent element of this element.
     * @param \ExifEye\core\ElementInterface|null $reference
     *            (Optional) if specified, the new element will be inserted
     *            before the reference element.
     */
    public function __construct($type, ElementInterface $parent = null, ElementInterface $reference = null)
    {
        $this->type = $type;
        
        // If $parent is null, this Element is the root of the DOM document that
        // stores the image structure.
        if (!$parent || !is_object($parent->DOMNode)) {
            $doc = new \DOMDocument();
            // @todo change syntax to ExifEyeDOMElement::class when dropping
            // PHP 5.4 support.
            $doc->registerNodeClass('DOMElement', 'ExifEye\core\DOM\ExifEyeDOMElement');
            $this->XPath = new \DOMXPath($doc);
            $parent_node = $doc;
        } else {
            $doc = $parent->DOMNode->ownerDocument;
            $parent_node = $parent->DOMNode;
        }

        $this->DOMNode = $doc->createElement($this->DOMNodeName);

        if ($reference) {
            $parent_node->insertBefore($this->DOMNode, $reference->DOMNode);
        } else {
            $parent_node->appendChild($this->DOMNode);
        }

        // Assign this Element as the payload of the DOM node.
        $this->DOMNode->setExifEyeElement($this);
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getRootElement()
    {
        return $this->DOMNode->ownerDocument->documentElement->getExifEyeElement();
    }

    /**
     * {@inheritdoc}
     */
    public function getParentElement()
    {
        return $this->DOMNode->getExifEyeElement() !== $this->getRootElement() ? $this->DOMNode->parentNode->getExifEyeElement() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getMultipleElements($expression)
    {
        $node_list = $this->getRootElement()->XPath->query($expression, $this->DOMNode);
        $ret = [];
        for ($i = 0; $i < $node_list->length; $i++) {
            $ret[] = $node_list->item($i)->getExifEyeElement();
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
                throw new ExifEyeException("Multiple elements returned for '%s'", $expression);
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
                throw new ExifEyeException("Multiple elements exist for '%s', cannot remove from structure", $expression);
        }
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
    public function setAttribute($name, $value)
    {
        return $this->DOMNode->setAttribute($name, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getAttribute($name)
    {
        return $this->DOMNode->getAttribute($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getContextPath()
    {
        // Get the path before this element.
        $parent_path = $this->getParentElement() ? $this->getParentElement()->getContextPath() : '';

        // Build the path fragment related to this node.
        $current_fragment = '/' . $this->DOMNode->nodeName;
        if ($this->DOMNode->attributes->length) {
            foreach ($this->DOMNode->attributes as $attribute) {
                $current_fragment .= ':' . $attribute->value;
            }
        }

        return $parent_path . $current_fragment;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        throw new ExifEyeException("'%s' does not support the getValue method.", $this->getType());
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        throw new ExifEyeException("'%s' does not support the toString method.", $this->getType());
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        return [
            'type' => $this->DOMNodeName,
            'path' => $this->getContextPath(),
            'class' => get_class($this),
            'valid' => $this->isValid(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = [])
    {
        $context['path'] = $this->getContextPath();
        $root_element = $this->getRootElement();
        if (property_exists($root_element, 'logger')) {  // xx should be logging anyway
            $root_element->logger->log($level, $message, $context);
            if ($root_element->externalLogger) {  // xx should be logging anyway
                $root_element->externalLogger->log($level, $message, $context);
            }
            if ($root_element->failLevel !== false && Logger::toMonologLevel($level) >= $root_element->failLevel) {  // xx should be logging anyway
                throw new ExifEyeException($message);
            }
        }
    }
}
