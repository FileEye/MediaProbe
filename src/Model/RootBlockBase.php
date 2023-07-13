<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\DOMElement;

/**
 * Base class for a MediaProbe root block.
 */
abstract class RootBlockBase extends BlockBase
{
    /**
     * The Xpath object associated to the root element.
     */
    protected readonly \DOMXpath $xPath;

    public function __construct(ItemDefinition $definition)
    {
        $this->definition = $definition;

        $DOMNodeName = $this->getCollection()->getPropertyValue('DOMNode'));

        // Add root DOM stuff.
        $doc = new \DOMDocument();
        $doc->registerNodeClass('DOMElement', DOMElement::class);
        $this->xPath = new \DOMXPath($doc);
        $this->DOMNode = $doc->createElement($DOMNodeName);

        // Assign this Element as the payload of the DOM node.
        $this->DOMNode->setMediaProbeElement($this);

        if ($this->getCollection()->hasProperty('item')) {
            $this->setAttribute('id', $this->getCollection()->getPropertyValue('item'));
        }
        if ($this->getCollection()->hasProperty('name')) {
            $this->setAttribute('name', $this->getCollection()->getPropertyValue('name'));
        }
    }
}
