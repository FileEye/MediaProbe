<?php

namespace FileEye\ImageInfo\core\Entry\Core;

use FileEye\ImageInfo\core\Block\BlockBase;
use FileEye\ImageInfo\core\Block\IfdItem;
use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\ImageInfo;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

/**
 * Class for holding unsigned shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts.
 */
class Short extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Short';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Short';

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
    protected $max = 65535;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $args = [];
        for ($i = 0; $i < $ifd_item->getComponents(); $i ++) {
            $args[] = $data_element->getShort($ifd_item->getDataOffset() + ($i * 2));
        }
        $this->setValue($args);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromShort($number, $order);
    }
}
