<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Model\BlockBase;

/**
 * Class used to hold data for a JPEG Thumbnail.
 */
class Thumbnail extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));
        // Adds the segment data as an Undefined entry.
        new Undefined($this, $data);
    }
}
