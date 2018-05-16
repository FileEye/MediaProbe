<?php

namespace ExifEye\core\DOM;

use ExifEye\core\ElementInterface;

class ExifEyeDOMElement extends \DOMElement
{
    protected $exifEyeElement;

    public function setExifEyeElement(ElementInterface $element)
    {
        $this->exifEyeElement = $element;
    }

    public function resetExifEyeElement()
    {
        $this->exifEyeElement = null;
    }

    public function getExifEyeElement()
    {
        return $this->exifEyeElement;
    }

    public function getContextPath()
    {
        $parent_path = $this->parentNode && !($this->parentNode instanceof \DOMDocument) ? $this->parentNode->getContextPath() : '';

        $current_fragment = '/' . $this->nodeName;
        if ($this->attributes->length) {
            foreach ($this->attributes as $attribute) {
                $current_fragment .= ':' . $attribute->value;
            }
        }

        return $parent_path . $current_fragment;
    }
}
