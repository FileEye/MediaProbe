<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Model\ElementInterface;

/**
 * A class extending \DOMElement to hold a MediaProbe element.
 */
class DOMElement extends \DOMElement
{
    /**
     * The MediaProbe ElementInterface object associated to this node.
     */
    private ElementInterface $mediaProbeElement;

    /**
     * Sets the ElementInterface object associated to this node.
     */
    public function setMediaProbeElement(ElementInterface $element): void
    {
        $this->mediaProbeElement = $element;
    }

    /**
     * Gets the ElementInterface object associated to this node.
     */
    public function getMediaProbeElement(): ElementInterface
    {
        return $this->mediaProbeElement;
    }
}
