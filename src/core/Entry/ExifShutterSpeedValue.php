<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\SignedRational;
use FileEye\ImageProbe\core\ImageProbe;

/**
 * Decode text for an Exif/ShutterSpeedValue tag.
 */
class ExifShutterSpeedValue extends SignedRational
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return ImageProbe::fmt('%.0f/%.0f sec. (APEX: %d)', $this->getValue()[0], $this->getValue()[1], pow(sqrt(2), $this->getValue()[0] / $this->getValue()[1]));
    }
}
