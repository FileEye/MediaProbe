<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon MeasuredEV2 tags.
 */
class MeasuredEV2 extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return parent::getValue() / 8 - 6;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return round($this->getValue(), 2);
    }
}
