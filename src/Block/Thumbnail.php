<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;

/**
 * Class used to hold data for a JPEG Thumbnail.
 */
class Thumbnail extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element, int $start = 0, ?int $size = null): void
    {
        $thumbnail_data = new DataWindow($data_element, $start, $size);
    }
}
