<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Undefined;

/**
 * Class used to hold data for MakerNote tags.
 */
class ExifMakerNote extends Undefined
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'MakerNote';
}
