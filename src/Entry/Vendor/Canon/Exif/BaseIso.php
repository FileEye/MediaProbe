<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;

/**
 * Handler for Canon Base ISO tags.
 */
class BaseIso extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        return exp(parent::getValue() / 32 * log(2)) * 100 / 32;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return (string) round($this->getValue());
    }
}
