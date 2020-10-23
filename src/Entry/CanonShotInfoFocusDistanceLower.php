<?php

namespace FileEye\MediaProbe\Entry;

/**
 * Handler for Canon ShotInfo FocusDistanceLower tags.
 */
class CanonShotInfoFocusDistanceLower extends CanonFocusDistance
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name!='CanonShotInfo']/tag[@name='FocusDistanceLower']/entry")) {
            return $alternative_af_points_in_focus->getValue($options);
        } else {
            return $this->value[0];
        }
    }
}
