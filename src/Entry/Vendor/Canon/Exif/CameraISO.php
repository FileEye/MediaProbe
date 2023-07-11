<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon Camera ISO tags.
 */
class CameraISO extends SignedShort
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        $isoLookup = [
             0 => 'n/a',
            14 => 'Auto High', #PH (S3IS)
            15 => 'Auto',
            16 => 50,
            17 => 100,
            18 => 200,
            19 => 400,
            20 => 800, #PH
        ];
        if (parent::getValue() === 0x7fff) {
            return 0;
        }
        if (parent::getValue() & 0x4000) {
            return parent::getValue() & 0x3fff;
        } else {
            return isset($isoLookup[parent::getValue()]) ? $isoLookup[parent::getValue()] : "Unknown ({parent::getValue()})";
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue();
    }
}
