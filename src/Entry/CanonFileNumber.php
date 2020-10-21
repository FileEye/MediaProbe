<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon File Number tags.
 */
class CanonFileNumber extends Long
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
dump($this->value);  
        return exp($this->value[0] / 32 * log(2)) * 100;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return round($this->getValue());
    }
}
