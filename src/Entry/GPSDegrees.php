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
            $degrees = $this->dataElement->getRationalFloat(0);
            $minutes = $this->dataElement->getRationalFloat(8);
            $seconds = $this->dataElement->getRationalFloat(16);
            return $degrees + $minutes / 60 + $seconds / 3600;
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
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
