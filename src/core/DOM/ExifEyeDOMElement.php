<?php

namespace ExifEye\core\DOM;

use ExifEye\core\ElementInterface;

class ExifEyeDOMElement extends \DOMElement
{
    /**
     * The ExifeEye Element object associated to this node.
     *
     * @var \ExifEye\core\ElementInterface
     */
    protected $exifEyeElement;

    /**
     * Sets the ExifeEye Element object associated to this node.
     *
     * @param \ExifEye\core\ElementInterface
     *            the Element of this node.
     *
     * @return void
     */
    public function setExifEyeElement(ElementInterface $element)
    {
        $this->exifEyeElement = $element;
    }

    /**
     * Gets the ExifeEye Element object associated to this node.
     *
     * @return \ExifEye\core\ElementInterface
     *            the Element of this node.
     */
    public function getExifEyeElement()
    {
        return $this->exifEyeElement;
    }
}
