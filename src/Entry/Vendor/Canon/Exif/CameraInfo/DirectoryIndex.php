<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\CameraInfo;

use FileEye\MediaProbe\Entry\Core\Long;

/**
 * Handler for Canon Directory Index tags.
 */
class DirectoryIndex extends Long
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        return $this->dataElement->getLong(0) - 1;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue();
    }
}
