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
    public function getValue(array $options = []): mixed
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $val = $this->dataElement->getSignedRationalFloat();
            $val = abs($val) < 100 ? pow(2, -$val) : 0;
            if ($val < 0.25001 && $val > 0) {
                return 1 / ((int) (0.5 + 1 / $val));
            } else {
                return $val;
            }
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $val = $this->dataElement->getSignedRationalFloat();
            $val = abs($val) < 100 ? pow(2, -$val) : 0;
            if ($val < 0.25001 && $val > 0) {
                return MediaProbe::fmt("1/%d", (int) (0.5 + 1 / $val));
            } else {
                $val = MediaProbe::fmt("%.1f", $val);
                return preg_replace('/\.0$/', '', $val);
            }
        } else {
            return MediaProbe::fmt('%.0f/%.0f sec. (APEX: %d)', $this->dataElement->getSignedLong(0), $this->dataElement->getSignedLong(4), pow(sqrt(2), $this->dataElement->getSignedRationalFloat()));
        }
    }
}
