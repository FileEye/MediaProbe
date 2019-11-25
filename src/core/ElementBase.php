<?php

namespace FileEye\ImageProbe\core;

use FileEye\ImageProbe\core\Data\DataElement;
use FileEye\ImageProbe\core\DOM\ImageProbeDOMElement;
use FileEye\ImageProbe\core\ImageProbe;
use FileEye\ImageProbe\core\ImageProbeException;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Monolog\Logger;

/**
 * Base class for ElementInterface objects.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all ImageProbe
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
     * Whether this element is valid.
     *
     * @var bool
     */
    protected $valid = false;

    /**
     * Constructs an Element object.
     *
     * @param string $dom_node_name
     *            The name of the DOM node associated to this element.
     * @param \FileEye\ImageProbe\core\ElementInterface|null $parent
     *            (Optional) the parent element of this element.
     * @param \FileEye\ImageProbe\core\ElementInterface|null $reference
     *            (Optional) if specified, the new element will be inserted
     *            before the reference element.
     */
    public function __construct($dom_node_name, ElementInterface $parent = null, ElementInterface $reference = null)
    {
        // If $parent is null, this Element is the root of the DOM document that
        // stores the image structure.
        if (!$parent || !is_object($parent->DOMNode)) {
            $doc = new \DOMDocument();
            // @todo change syntax to ImageProbeDOMElement::class when dropping
            // PHP 5.4 support.
            $doc->registerNodeClass('DOMElement', 'FileEye\ImageProbe\core\DOM\ImageProbeDOMElement');
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
        $this->DOMNode->setImageProbeElement($this);
    }

    /**
     * {@inheritdoc}
     */
    public function getRootElement()
    {
        return $this->DOMNode->ownerDocument->documentElement->getImageProbeElement();
    }

    /**
     * {@inheritdoc}
     */
    public function getParentElement()
    {
        return $this->DOMNode->getImageProbeElement() !== $this->getRootElement() ? $this->DOMNode->parentNode->getImageProbeElement() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getMultipleElements($expression)
    {
        $node_list = $this->getRootElement()->XPath->query($expression, $this->DOMNode);
        $ret = [];
        for ($i = 0; $i < $node_list->length; $i++) {
            $ret[] = $node_list->item($i)->getImageProbeElement();
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
                throw new ImageProbeException("Multiple elements returned for '%s'", $expression);
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
                throw new ImageProbeException("Multiple elements exist for '%s', cannot remove from structure", $expression);
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
     * xx todo
     */
    protected function getLogger()
    {
        return $this->getRootElement()->getLogger();
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
        throw new ImageProbeException("%s does not implement the %s method.", get_called_class(), __FUNCTION__);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        throw new ImageProbeException("%s does not implement the %s method.", get_called_class(), __FUNCTION__);
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
                throw new ImageProbeException($message);
            }
        }
    }
}
