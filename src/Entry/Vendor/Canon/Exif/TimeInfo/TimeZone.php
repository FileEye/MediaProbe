<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\TimeInfo;

use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Entry\ExifTrait;

/**
 * Handler for Canon TimeInfo TimeZone tags.
 */
class TimeZone extends SignedLong
{
    use ExifTrait;

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->timeZoneToString($this->getValue());
    }
}
