<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Data\DataElement;

/**
 * Interface for Block objects that identify MIME types.
 */
interface MediaTypeBlockInterface
{
    /**
     * Determines if the data element matches the MIME type of the block.
     */
    public static function isDataMatchingMediaType(DataElement $dataElement): bool;
}
