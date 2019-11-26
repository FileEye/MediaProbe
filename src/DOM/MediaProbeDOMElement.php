<?php

namespace FileEye\MediaProbe\DOM;

use FileEye\MediaProbe\ElementInterface;

class MediaProbeDOMElement extends \DOMElement
{
    /**
     * The ExifeEye Element object associated to this node.
     *
     * @var \FileEye\MediaProbe\ElementInterface
     */
    protected $mediaProbeElement;

    /**
     * Sets the ExifeEye Element object associated to this node.
     *
     * @param \FileEye\MediaProbe\ElementInterface
     *            the Element of this node.
     *
     * @return void
     */
    public function setMediaProbeElement(ElementInterface $element)
    {
        $this->mediaProbeElement = $element;
    }

    /**
     * Gets the ExifeEye Element object associated to this node.
     *
     * @return \FileEye\MediaProbe\ElementInterface
     *            the Element of this node.
     */
    public function getMediaProbeElement()
    {
        return $this->mediaProbeElement;
    }
}
