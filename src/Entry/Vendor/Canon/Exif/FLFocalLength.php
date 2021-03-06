<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Focal Length tags.
 */
class FLFocalLength extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternate = $this->getRootElement()->getElement("//ifd[@name='ExifIFD']/tag[@name='FocalLength']/entry")) {
            $value = $alternate->getValue();
            return $value[0] / $value[1];
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
