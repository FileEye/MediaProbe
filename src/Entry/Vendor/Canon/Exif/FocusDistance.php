<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Focus Distance tags.
 */
class FocusDistance extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return parent::getValue() / 100;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue() > 655.345 ? "inf" : round($this->getValue(), 2) . ' m';
    }
}
