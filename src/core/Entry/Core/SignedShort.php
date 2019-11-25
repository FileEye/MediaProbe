<?php

namespace FileEye\ImageProbe\core\Entry\Core;

use FileEye\ImageProbe\core\Block\BlockBase;
use FileEye\ImageProbe\core\Block\IfdItem;
use FileEye\ImageProbe\core\Data\DataElement;
use FileEye\ImageProbe\core\Utility\ConvertBytes;

/**
 * Class for holding signed shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts.
 */
class SignedShort extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'SignedShort';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'SignedShort';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    protected $min = -32768;

    /**
     * {@inheritdoc}
     */
    protected $max = 32767;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $args = [];
        for ($i = 0; $i < $ifd_item->getComponents(); $i ++) {
            $args[] = $data_element->getSignedShort($ifd_item->getDataOffset() + ($i * 2));
        }
        $this->setValue($args);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromSignedShort($number, $order);
    }
}
