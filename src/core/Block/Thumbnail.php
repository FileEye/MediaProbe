<?php

namespace FileEye\ImageProbe\core\Block;

use FileEye\ImageProbe\core\Data\DataElement;

/**
 * Class used to hold data for a JPEG Thumbnail.
 */
class Thumbnail extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        if ($size === null) {
            $size = $data_element->getSize();
        }

        return $this; // xx
    }
}
