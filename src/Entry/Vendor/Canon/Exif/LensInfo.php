<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Utility\HexDump;

/**
 * Decode text for an Canon Lens Info tag.
 */
class LensInfo extends Undefined
{
    public function toString(array $options = []): string
    {
        return HexDump::dumpHex($this->toBytes());
    }
}
