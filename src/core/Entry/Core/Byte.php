<?php

namespace FileEye\ImageInfo\core\Entry\Core;

use FileEye\ImageInfo\core\Block\BlockBase;
use FileEye\ImageInfo\core\Block\IfdItem;
use FileEye\ImageInfo\core\Data\DataElement;

/**
 * Class for holding unsigned bytes.
 *
 * This class can hold bytes, either just a single byte or an array of bytes.
 */
class Byte extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Byte';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Byte';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    protected $min = 0;

    /**
     * {@inheritdoc}
     */
    protected $max = 255;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $args = [];
        for ($i = 0; $i < $ifd_item->getComponents(); $i ++) {
            $args[] = $data_element->getByte($ifd_item->getDataOffset() + $i);
        }
        $this->setValue($args);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return chr($number);
    }
}
