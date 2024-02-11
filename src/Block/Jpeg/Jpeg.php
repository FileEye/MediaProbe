<?php

namespace FileEye\MediaProbe\Block\Jpeg;

use FileEye\MediaProbe\Model\BlockBase;

/**
 * Class for handling a JPEG image data.
 */
class Jpeg extends BlockBase
{
    /**
     * JPEG delimiter.
     */
    const JPEG_DELIMITER = 0xFF;

    /**
     * JPEG header.
     */
    const JPEG_HEADER = "\xFF\xD8\xFF";
}
