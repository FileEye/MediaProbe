<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Rational;

/**
 * Decode text for an Exif/ExposureTime tag.
 */
class GPSDegrees extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        $degrees = $this->getValue()[0][0] / $this->getValue()[0][1];
        $minutes = $this->getValue()[1][0] / $this->getValue()[1][1];
        $seconds = $this->getValue()[2][0] / $this->getValue()[2][1];
        return sprintf('%s° %s\' %s" (%.2f°)', $degrees, $minutes, $seconds, $degrees + $minutes / 60 + $seconds / 3600);
    }
}
