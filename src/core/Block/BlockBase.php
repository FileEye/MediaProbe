<?php

namespace ExifEye\core\Block;

use ExifEye\core\Collection;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ElementBase;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Base class for ExifEye blocks.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all ExifEye
 * Block objects.
 */
abstract class BlockBase extends ElementBase
{
    /**
     * The Collection of this Block.
     *
     * @var \ExifEye\core\Collection
     */
    protected $collection;

    /**
     * Constructs a Block object.
     *
     * @param \ExifEye\core\Collection $collection
     *            The Collection of this Block.
     * @param \ExifEye\core\Block\BlockBase|null $parent
     *            (Optional) the parent Block of this Block.
     * @param \ExifEye\core\Block\BlockBase|null $reference
     *            (Optional) if specified, the new Block will be inserted
     *            before the reference Block.
     */
    public function __construct(Collection $collection, BlockBase $parent = null, BlockBase $reference = null)
    {
        $this->collection = $collection;
        parent::__construct($collection->getPropertyValue('DOMNode'), $parent, $reference);
    }

    /**
     * Gets the Collection of this Block.
     *
     * @return \ExifEye\core\Collection
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
