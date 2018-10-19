<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ElementBase;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing an Exif TAG.
 */
abstract class BlockBase extends ElementBase
{
    /**
     * The block has an ExifEye specification description.
     *
     * @var bool
     */
    protected $hasSpecification = false;

    /**
     * Determines if the Block has an ExifEye specification.
     *
     * @returns bool
     */
    public function hasSpecification()
    {
        return $this->hasSpecification;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        $bytes = '';
        foreach ($this->getMultipleElements("*") as $sub) {
            $bytes .= $sub->toBytes();
        }
        return $bytes;
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        $dump = array_merge(parent::toDumpArray(), $this->getAttributes());
        foreach ($this->getMultipleElements("*") as $sub_element) {
            $dump['elements'][] = $sub_element->toDumpArray();
        }
        return $dump;
    }
}
