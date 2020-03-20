<?php

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\ElementInterface;

class DOMElement extends \DOMElement
{
    /**
     * The MediaProbe ElementInterface object associated to this node.
     *
     * @var \FileEye\MediaProbe\ElementInterface
     */
    protected $mediaProbeElement;

    /**
     * Sets the ElementInterface object associated to this node.
     *
     * @param \FileEye\MediaProbe\ElementInterface
     *   The ElementInterface object associated to this node.
     *
     * @return void
     */
    public function setMediaProbeElement(ElementInterface $element): void
    {
        $this->mediaProbeElement = $element;
    }

    /**
     * Gets the ElementInterface object associated to this node.
     *
     * @return \FileEye\MediaProbe\ElementInterface
     *   The ElementInterface objects associated to this node.
     */
    public function getMediaProbeElement(): ElementInterface
    {
        return $this->mediaProbeElement;
    }
}
