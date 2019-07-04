<?php

namespace FileEye\ImageInfo\core\DOM;

use FileEye\ImageInfo\core\ElementInterface;

class ImageInfoDOMElement extends \DOMElement
{
    /**
     * The ExifeEye Element object associated to this node.
     *
     * @var \FileEye\ImageInfo\core\ElementInterface
     */
    protected $imageInfoElement;

    /**
     * Sets the ExifeEye Element object associated to this node.
     *
     * @param \FileEye\ImageInfo\core\ElementInterface
     *            the Element of this node.
     *
     * @return void
     */
    public function setImageInfoElement(ElementInterface $element)
    {
        $this->imageInfoElement = $element;
    }

    /**
     * Gets the ExifeEye Element object associated to this node.
     *
     * @return \FileEye\ImageInfo\core\ElementInterface
     *            the Element of this node.
     */
    public function getImageInfoElement()
    {
        return $this->imageInfoElement;
    }
}
