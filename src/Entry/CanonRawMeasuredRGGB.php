<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon RawMeasuredRGGB tags.
 */
class CanonRawMeasuredRGGB extends Long
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format = 'xx') {
            return $this->value;
        }
        $value = [];
        foreach ($this->value as $v) {
            $value[] = (($v >> 16) | ($v << 16)) & 0xffffffff;
        }
        return $format === 'exiftool' ? implode(' ', $value) : $value;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return implode(' ', $this->getValue());
    }
}
