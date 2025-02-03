<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Short;

/**
 * Handler for Canon Focal Plane tags.
 */
class FocalPlaneSize extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        return parent::getValue() * 25.4 / 1000;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return round($this->getValue(), 2) . ' mm';
    }
}
