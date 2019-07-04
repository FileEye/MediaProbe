<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Entry\Core\SignedRational;
use FileEye\ImageInfo\core\ImageInfo;

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
        return ImageInfo::fmt('%.0f/%.0f sec. (APEX: %d)', $this->getValue()[0], $this->getValue()[1], pow(sqrt(2), $this->getValue()[0] / $this->getValue()[1]));
    }
}
