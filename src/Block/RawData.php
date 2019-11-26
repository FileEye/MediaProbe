<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for storing raw data as a block.
 */
class RawData extends BlockBase
{
    /**
     * The data length.
     */
    protected $components;

    /**
     * Construct a new RawData object.
     */
    public function __construct(Collection $collection, BlockBase $parent, BlockBase $reference = null)
    {
        parent::__construct($collection, $parent, $reference);
        $this->debug('Raw data');
    }

    /**
     * Returns the data length.
     *
     * @return int
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        if ($size === null) {
            $size = $data_element->getSize();
        }

        $this->components = $size;
        new Undefined($this, [$data_element->getBytes($offset, $this->components)]);

        $this->valid = true;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        return $this->getElement("entry")->toBytes();
    }
}
