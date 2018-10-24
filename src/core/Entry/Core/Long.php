<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Block\IfdItem;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class for holding unsigned longs.
 *
 * This class can hold longs, either just a single long or an array of longs.
  */
class Long extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Long';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Long';

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
    protected $max = 4294967295;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $args = [];
        for ($i = 0; $i < $ifd_item->getComponents(); $i ++) {
            $args[] = $data_element->getLong($ifd_item->getDataOffset() + ($i * 4));
        }
        $this->setValue($args);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromLong($number, $order);
    }
}
