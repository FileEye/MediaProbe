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
     * Loads data into a block.
     *
     * @param DataElement $data_element
     *            the data element that will provide the data.
     * @param int $offset
     *            (Optional) the offset within the data element where the
     *            block will be found.
     * @param int|null $size
     *            (Optional) the size of the data from the offset.
     * @param array $options
     *            (Optional) an array with additional options for the load.
     *
     * @returns BlockBase
     */
    abstract public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = []);

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

        // Dump sub-Blocks.
        foreach ($this->getMultipleElements("*") as $sub_element) {
            $dump['elements'][] = $sub_element->toDumpArray();
        }

        return $dump;
    }
}
