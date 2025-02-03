<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Dumper\DumperInterface;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Model\RootBlockBase;
use FileEye\MediaProbe\Utility\ConvertBytes;
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
     */
    protected DOMElement $DOMNode;

    /**
     * Whether this element was successfully validated.
     */
    protected bool $valid = true;

    /**
     * @param string $dom_node_name
     *            The name of the DOM node associated to this element.
     * @param ElementInterface|null $parent
     *            (Optional) the parent element of this element.
     * @param ElementInterface|null $reference
     *            (Optional) if specified, the new element will be inserted
     *            before the reference element.
     */
    public function __construct(string $dom_node_name, ?ElementInterface $parent = null, ?ElementInterface $reference = null)
    {
        // If $parent is null, this Element is the root of the DOM document that
        // stores the media structure.
        if (!isset($parent) || !isset($parent->DOMNode)) {
            $doc = new \DOMDocument();
            $doc->registerNodeClass('DOMElement', DOMElement::class);
            $parent_node = $doc;
        } else {
            $doc = $parent->DOMNode->ownerDocument;
            $parent_node = $parent->DOMNode;
        }

        $this->DOMNode = $doc->createElement($dom_node_name);

        if ($reference) {
            assert($reference instanceof ElementBase);
            $parent_node->insertBefore($this->DOMNode, $reference->DOMNode);
        } else {
            $parent_node->appendChild($this->DOMNode);
        }

        // Assign this Element as the payload of the DOM node.
        $this->DOMNode->setMediaProbeElement($this);
    }

    public function getRootElement(): ElementInterface
    {
        $doc = $this->DOMNode->ownerDocument->documentElement;
        assert($doc instanceof DOMElement);
        return $doc->getMediaProbeElement();
    }

    public function getParentElement(): ?ElementInterface
    {
        $domNode = $this->DOMNode;
        assert($domNode instanceof DOMElement);
        if ($domNode->getMediaProbeElement() !== $this->getRootElement()) {
            $parentDomNode = $this->DOMNode->parentNode;
            assert($parentDomNode instanceof DOMElement);
            return $parentDomNode->getMediaProbeElement();
        }
        return null;
    }

    public function getMultipleElements(string $expression): array
    {
        $rootElement = $this->getRootElement();
        assert($rootElement instanceof RootBlockBase, get_class($rootElement));
        $node_list = $rootElement->XPath->query($expression, $this->DOMNode);
        $ret = [];
        for ($i = 0; $i < $node_list->length; $i++) {
            assert($node_list->item($i) instanceof DOMElement);
            $ret[] = $node_list->item($i)->getMediaProbeElement();
        }
        return $ret;
    }

    public function getElement(string $expression): ?ElementInterface
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

    public function removeElement(string $expression): bool
    {
        $ret = $this->getMultipleElements($expression);
        switch (count($ret)) {
            case 0:
                return false;
            case 1:
                assert($ret[0] instanceof ElementBase);
                $ret[0]->DOMNode->parentNode->removeChild($ret[0]->DOMNode);
                return true;
            default:
                throw new MediaProbeException("Multiple elements exist for '%s', cannot remove from structure", $expression);
        }
    }

    public function setAttribute(string $name, string $value): \DOMAttr|bool
    {
        return $this->DOMNode->setAttribute($name, $value);
    }

    public function getAttributes(): array
    {
        $attr = [];
        foreach ($this->DOMNode->attributes as $attribute) {
            $attr[$attribute->name] = $attribute->value;
        }
        return $attr;
    }

    public function getAttribute(string $name): string
    {
        return $this->DOMNode->getAttribute($name);
    }

    /**
     * Returns the format of the context path segment.
     */
    protected function getContextPathSegmentPattern(): string
    {
        return '/{DOMNode}';
    }

    public function getContextPath(): string
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

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function getValue(array $options = []): mixed
    {
        throw new MediaProbeException("%s does not implement the %s method.", static::class, __FUNCTION__);
    }

    public function toString(array $options = []): string
    {
        throw new MediaProbeException("%s does not implement the %s method.", static::class, __FUNCTION__);
    }

    abstract public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0): string;

    public function asArray(DumperInterface $dumper, array $context = []): array
    {
        return $dumper->dumpElement($this, $context);
    }

    public function collectInfo(array $context = []): array
    {
        $info = [];
        $info['node'] = $this->DOMNode->nodeName;
        if (($name = $this->getAttribute('name')) !== null) {
            $info['name'] = $name;
        }
        if (($item = $this->getAttribute('id')) !== null) {
            $info['item'] = $item;
        }
        return $info;
    }

    public function debugInfo(array $context = []): bool
    {
        $rootElement = $this->getRootElement();
        assert($rootElement instanceof Media);
        $debugInfo = $this->asArray($rootElement->debugDumper, $context);
        $msg = $debugInfo['_msg'] ?? static::class;
        unset($debugInfo['_msg']);
        $this->debug($msg, $debugInfo);
        return true;
    }

    public function log($level, $message, array $context = []): void
    {
        $context['path'] = $this->getContextPath();
        $root_element = $this->getRootElement();

/*        if (method_exists($root_element, 'getStopwatch')) {
            $message = (string) $root_element->getStopwatch()->getEvent('media-parsing') . ' ' . $message;
        }*/

        if (property_exists($root_element, 'logger') && isset($root_element->logger)) {  // xx should be logging anyway
            assert($root_element instanceof RootBlockBase);
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
