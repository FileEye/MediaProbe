<?php

namespace ExifEye\core\Entry;

/**
 * Decode text for an Exif/ExifVersion tag.
 */
class ExifVersion extends VersionBase
{
    /**
     * {@inheritdoc}
     */
    protected $stringElement = 'Exif';
}
