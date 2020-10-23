<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon ShotInfo FocusDistanceUpper tags.
 */
class CanonShotInfoFocusDistanceUpper extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name!='CanonShotInfo']/tag[@name='FocusDistanceUpper']/entry")) {
            return $alternative_af_points_in_focus->getValue($options);
        } else {
            return $this->value[0];
        }
    }
}
