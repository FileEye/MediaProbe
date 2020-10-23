<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon ShotInfo AFPointsInFocus tags.
 */
class CanonShotInfoAFPointsInFocus extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative_af_points_in_focus = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name!='CanonShotInfo']/tag[@name='AFPointsInFocus']/entry")) {
            return $alternative_af_points_in_focus->getValue($options);
        } else {
            return $this->value[0];
        }
    }

    /**
     * {@inheritdoc}
     */
/*    public function toString(array $options = [])
    {
        $value = $this->getValue();
        return $value > 0 ? "+$value" : $value;
    }*(
}
