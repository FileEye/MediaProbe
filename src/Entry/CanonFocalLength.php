<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Camera ISO tags.
 */
class CanonFocalLength extends Short
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
            $denominator = $focal_units->getValue();
        }

        return $this->value[0] / $denominator;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return round($this->getValue()) . ' mm';
    }
}
