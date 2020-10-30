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
    public function getValue(array $options = [])
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
        if ($this->value[0] === 0x7fff) {
            return 0;
        }
        if ($this->value[0] & 0x4000) {
            return $this->value[0] & 0x3fff;
        } else {
            return isset($isoLookup[$this->value[0]]) ? $isoLookup[$this->value[0]] : "Unknown ({$this->value[0]})";
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}
