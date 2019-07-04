<?php

namespace FileEye\ImageInfo\core\Entry\Core;

use FileEye\ImageInfo\core\Block\BlockBase;
use FileEye\ImageInfo\core\Block\IfdItem;
use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

/**
 * Class for holding signed longs.
 *
 * This class can hold longs, either just a single long or an array of
 * longs.
 */
class SignedLong extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'SignedLong';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'SignedLong';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    protected $min = -2147483648;

    /**
     * {@inheritdoc}
     */
    protected $max = 2147483647;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $args = [];
        for ($i = 0; $i < $ifd_item->getComponents(); $i ++) {
            $args[] = $data_element->getSignedLong($ifd_item->getDataOffset() + ($i * 4));
        }
        $this->setValue($args);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromSignedLong($number, $order);
    }
}
