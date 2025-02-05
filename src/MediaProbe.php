<?php

namespace FileEye\MediaProbe;

use Composer\InstalledVersions;

class MediaProbe
{
    /**
     * Returns the current version of MediaProbe.
     */
    public static function version(): string
    {
        return InstalledVersions::getPrettyVersion('fileeye/mediaprobe');
    }
}
