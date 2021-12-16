<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon File Number tags.
 */
class FileNumber extends Long
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $val = (string) $this->getValue();
        return empty($val) ? '0' : substr($val, 0, 3) . '-' . substr($val, 3);
    }
}
