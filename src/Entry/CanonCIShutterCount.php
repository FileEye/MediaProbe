<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon File Index tags.
 */
class CanonCIShutterCount extends Long
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value[0] + 1;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}