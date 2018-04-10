<?php

namespace ExifEye\core\Entry;

/**
 * Decode text for an Exif/FlashPixVersion tag.
 */
class ExifFlashPixVersion extends VersionBase
{
    /**
     * {@inheritdoc}
     */
    protected static $stringElement = 'FlashPix';
}
