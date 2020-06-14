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
    public function toString(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $degrees = $this->getValue()[0][0] / $this->getValue()[0][1];
            $minutes = $this->getValue()[1][0] / $this->getValue()[1][1];
            $seconds = $this->getValue()[2][0] / $this->getValue()[2][1];
            return $degrees + $minutes / 60 + $seconds / 3600;
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $degrees = $this->getValue()[0][0] / $this->getValue()[0][1];
        $minutes = $this->getValue()[1][0] / $this->getValue()[1][1];
        $seconds = $this->getValue()[2][0] / $this->getValue()[2][1];
        return sprintf('%s° %s\' %s" (%.2f°)', $degrees, $minutes, $seconds, $degrees + $minutes / 60 + $seconds / 3600);
    }
}
