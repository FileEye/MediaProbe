<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\SignedRational;
use ExifEye\core\ExifEye;

/**
 * Decode text for an Exif/ShutterSpeedValue tag.
 */
class ExifShutterSpeedValue extends SignedRational
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        return ExifEye::fmt('%.0f/%.0f sec. (APEX: %d)', $this->getValue()[0], $this->getValue()[1], pow(sqrt(2), $this->getValue()[0] / $this->getValue()[1]));
    }
}
