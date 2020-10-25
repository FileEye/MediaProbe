<?php

namespace FileEye\MediaProbe\Entry;

/**
 * Handler for Canon ShotInfo FocusDistanceUpper tags.
 */
class CanonShotInfoFocusDistanceUpper extends CanonFocusDistance
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        if ($alternative = $this->getRootElement()->getElement("//makerNote[@name='Canon']/*[@name='CanonFileInfo']/tag[@name='FocusDistanceUpper']/entry")) {
            return $alternative->getValue($options);
        } else {
            return $this->value[0] / 100;
        }
    }
}
