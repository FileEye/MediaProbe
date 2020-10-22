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
        if (!$focal_units = $this->getRootElement()->getElement("//makerNote[@name='Canon']//tag[@name='FocalUnits']")) {
            return 1;
        }

        dump($focal_units);
        return 1;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}
