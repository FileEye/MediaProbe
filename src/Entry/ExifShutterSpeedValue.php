<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedRational;
use FileEye\MediaProbe\MediaProbe;

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
        if (($options['format'] ?? null) === 'exiftool') {
            $val = $this->getValue()[0] / $this->getValue()[1];
            $val = abs($val) < 100 ? pow(2, -$val) : 0;
            if ($val < 0.25001 && $val > 0) {
                return MediaProbe::fmt("1/%d", (int) (0.5 + 1 / $val));
            } else {
                $val = MediaProbe::fmt("%.1f", $val);
                return preg_replace('/\.0$/', '', $val);
            }
        } else {
            return MediaProbe::fmt('%.0f/%.0f sec. (APEX: %d)', $this->getValue()[0], $this->getValue()[1], pow(sqrt(2), $this->getValue()[0] / $this->getValue()[1]));
        }
    }
}
