<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
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
    // xx
    protected $definition;

    /**
     * Base constructor.
     *
     * @todo xx
     */
    public function __construct(ItemDefinition $definition, BlockBase $parent = null, BlockBase $reference = null)
    {
        $collection = $definition->getCollection();

        parent::__construct($collection, $parent, $reference);

        if ($collection->getPropertyValue('item') !== null) {
            $this->setAttribute('id', $collection->getPropertyValue('item'));
        }
        $this->setAttribute('name', $collection->getPropertyValue('name'));
        $this->definition = $definition;
    }

    /**
     * xxx
     */
    public function getFormat()
    {
        return $this->getElement("entry") ? $this->getElement("entry")->getFormat() : ItemFormat::UNDEFINED;
    }

    /**
     * Returns the data length.
     *
     * @return int
     */
    public function getComponents()
    {
        return $this->components; // xxx ???
    }

    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element, int $start = 0, ?int $size = null): void
    {
        $raw_data = new DataWindow($data_element, $start, $size);
        $this->debugBlockInfo($raw_data);
        new Undefined($this, [$raw_data->getBytes()]);
        $this->valid = true;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        return $this->getElement("entry")->toBytes();  // xxx ????
    }

    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern()
    {
        if ($this->getAttribute('name') !== '') {
            return '/{DOMNode}:{name}';
        }
        return '/{DOMNode}';
    }
}
