<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
