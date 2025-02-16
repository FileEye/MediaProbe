<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;

/**
 * Handler for Canon Bulb Duration tags.
 */
class BulbDuration extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        return parent::getValue() / 10;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return (string) round($this->getValue());
    }
}
