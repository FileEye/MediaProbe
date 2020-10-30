<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;

/**
 * Decode text for an Canon Lens Info tag.
 */
class LensInfo extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return MediaProbe::dumpHex($this->toBytes());
    }
}
