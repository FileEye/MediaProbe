<?php

namespace FileEye\MediaProbe\Entry;

/**
 * Handler for Canon ShotInfo FNumber tags.
 */
class CanonShotInfoFNumber extends CanonApertureValue
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return round($this->getValue(), 1);
    }
}
