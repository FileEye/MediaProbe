<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataElement;

/**
 * Class for holding signed bytes.
 *
 * This class can hold bytes, either just a single byte or an array of
 * bytes.
 */
class SignedByte extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'SignedByte';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'SignedByte';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    protected $min = -128;

    /**
     * {@inheritdoc}
     */
    protected $max = 127;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        $data_offset = $options['data_offset'];
        $components = $options['components'];
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_element->getSignedByte($data_offset + $i);
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
