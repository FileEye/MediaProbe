<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementBase;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Base class for MediaProbe blocks.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all MediaProbe
 * Block objects.
 */
abstract class BlockBase extends ElementBase
{
    /**
     * The Collection of this Block.
     *
     * @var \FileEye\MediaProbe\Collection
     */
    protected $collection;

    /**
     * Constructs a Block object.
     *
     * @param \FileEye\MediaProbe\Collection $collection
     *            The Collection of this Block.
     * @param \FileEye\MediaProbe\Block\BlockBase|null $parent
     *            (Optional) the parent Block of this Block.
     * @param \FileEye\MediaProbe\Block\BlockBase|null $reference
     *            (Optional) if specified, the new Block will be inserted
     *            before the reference Block.
     */
    public function __construct(Collection $collection, BlockBase $parent = null, BlockBase $reference = null)
    {
        $this->collection = $collection;
        parent::__construct($collection->getPropertyValue('DOMNode'), $parent, $reference);
        if ($collection->getPropertyValue('name') !== null) {
            $this->setAttribute('name', $collection->getPropertyValue('name'));
        }
    }

    /**
     * Loads data into an element.
     *
     * @param DataElement $data_element
     *   The data element that will provide the data.
     */
    public function loadFromData(DataElement $data_element): void
    {
        throw new MediaProbeException("%s does not implement the %s method.", get_called_class(), __FUNCTION__);
    }

    /**
     * Gets the Collection of this Block.
     *
     * @return \FileEye\MediaProbe\Collection
     */
    public function getCollection()
    {
        return $this->collection;
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
        $dump = array_merge(parent::toDumpArray(), $this->getAttributes(), ['collection' => $this->getCollection()->getId()]);
        foreach ($this->getMultipleElements("*") as $sub_element) {
            $dump['elements'][] = $sub_element->toDumpArray();
        }
        return $dump;
    }
}
