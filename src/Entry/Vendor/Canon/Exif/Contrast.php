<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Entry\ExifTrait;

/**
 * Handler for Canon Contrast tags.
 */
class Contrast extends SignedShort
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
