<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom tags representing Aperture range.
 */
class CanonCustomApertureRange extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $v = [];
            $v[0] = $this->value[0];
            $v[1] = exp(($this->value[1] / 8 - 1) * log(2) / 2);
            $v[2] = exp(($this->value[2] / 8 - 1) * log(2) / 2);
            return implode(' ', $v);
        }
        return parent::getValue();
    }
}
