<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Rational;

/**
 * Handler for GPS tags representing degrees.
 */
class GPSDegrees extends Rational
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $degrees = $this->value[0][0] / $this->value[0][1];
            $minutes = $this->value[1][0] / $this->value[1][1];
            $seconds = $this->value[2][0] / $this->value[2][1];
            return $degrees + $minutes / 60 + $seconds / 3600;
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $degrees = $this->getValue()[0];
        $minutes = $this->getValue()[1];
        $seconds = $this->getValue()[2];
        if (($options['format'] ?? null) === 'exiftool') {
            return sprintf('%s deg %s\' %.2f"', $degrees, $minutes, $seconds);
        } else {
            return sprintf('%s° %s\' %s" (%.2f°)', $degrees, $minutes, $seconds, $degrees + $minutes / 60 + $seconds / 3600);
        }
    }
}
