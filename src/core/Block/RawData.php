<?php

namespace FileEye\ImageInfo\core\Block;

use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\Entry\Core\Undefined;
use FileEye\ImageInfo\core\Collection;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

/**
 * Class for JPEG raw data.
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
    public function __construct(BlockBase $parent, BlockBase $reference = null)
    {
        parent::__construct(Collection::get('rawData'), $parent, $reference);
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
