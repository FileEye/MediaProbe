<?php

namespace FileEye\ImageProbe\core\DOM;

use FileEye\ImageProbe\core\ElementInterface;

class ImageProbeDOMElement extends \DOMElement
{
    /**
     * The ExifeEye Element object associated to this node.
     *
     * @var \FileEye\ImageProbe\core\ElementInterface
     */
    protected $imageProbeElement;

    /**
     * Sets the ExifeEye Element object associated to this node.
     *
     * @param \FileEye\ImageProbe\core\ElementInterface
     *            the Element of this node.
     *
     * @return void
     */
    public function setImageProbeElement(ElementInterface $element)
    {
        $this->imageProbeElement = $element;
    }

    /**
     * Gets the ExifeEye Element object associated to this node.
     *
     * @return \FileEye\ImageProbe\core\ElementInterface
     *            the Element of this node.
     */
    public function getImageProbeElement()
    {
        return $this->imageProbeElement;
    }
}
