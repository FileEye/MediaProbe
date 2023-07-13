<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

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

    /**
     * Constructs an Element object.
     *
     * @param string $DOMNodeName
     *   The name of the DOM node associated to this element.
     */
    public function __construct(string $DOMNodeName)
    {
        $doc = new \DOMDocument();
        $doc->registerNodeClass('DOMElement', DOMElement::class);
        $this->xPath = new \DOMXPath($doc);
        $this->DOMNode = $doc->createElement($DOMNodeName);

        // Assign this Element as the payload of the DOM node.
        $this->DOMNode->setMediaProbeElement($this);
    }
}
