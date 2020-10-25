<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Lens Serial Number tags.
 */
class CanonCILensSerialNumber extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $alternate = $this->getRootElement()->getElement("//ifd[@name='Exif']/tag[@name='LensSerialNumber']/entry");
        dump($alternate);
        if ($alternate) {
            return $alternate->getValue($options);
        } else {
            return bin2hex($this->value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}
