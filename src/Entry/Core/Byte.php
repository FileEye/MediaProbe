<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        $args = [];
        for ($i = 0; $i < $item_definition->getValuesCount(); $i ++) {
            $args[] = $data_element->getByte($item_definition->getDataOffset() + $i);
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
