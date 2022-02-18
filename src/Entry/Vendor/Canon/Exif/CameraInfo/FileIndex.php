<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Canon File Index tags.
 */
class FileIndex extends Long
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->dataElement->getLong(0) + 1;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue();
    }
}
