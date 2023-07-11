<?php

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\ElementInterface;

class DOMElement extends \DOMElement
{
    /**
     * The MediaProbe ElementInterface object associated to this node.
     */
    protected ElementInterface $mediaProbeElement;

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
