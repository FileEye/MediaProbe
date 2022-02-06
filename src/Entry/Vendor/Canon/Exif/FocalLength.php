<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Camera ISO tags.
 */
class FocalLength extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        // Get the Focal Units.
        if (!$focal_units = $this->getRootElement()->getElement("//makerNote[@name='Canon']//tag[@name='FocalUnits']/entry")) {
            $denominator = 1;
        } else {
            $denominator = $focal_units->getValue() ?: 1;
        }

        return parent::getValue() / $denominator;
    }
}
