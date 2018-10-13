<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;

/**
 * Class used to hold data for a JPEG Thumbnail.
 */
class Thumbnail extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'thumbnail';

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        return $this; // xx
    }
}
