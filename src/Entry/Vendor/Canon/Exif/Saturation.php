<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;

/**
 * Handler for Canon Saturation tags.
 */
class Saturation extends SignedShort
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->parameterToString($this->getValue());
    }
}
