<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Focal Length tags.
 */
class CanonFLFocalLength extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternate = $this->getRootElement()->getElement("//ifd[@name='Exif']/tag[@name='FocalLength']/entry")) {
            return $alternate->getValue();
        }

        if (!$focal_units = $this->getRootElement()->getElement("//makerNote[@name='Canon']//tag[@name='FocalUnits']/entry")) {
            $denominator = 1;
        } else {
            $denominator = $focal_units->getValue();
        }

        return $this->value[0] / $denominator;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue() . ' mm';
    }
}
