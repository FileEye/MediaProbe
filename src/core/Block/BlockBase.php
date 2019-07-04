<?php

namespace FileEye\ImageInfo\core\Block;

use FileEye\ImageInfo\core\Collection;
use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\ElementBase;
use FileEye\ImageInfo\core\Entry\Core\EntryInterface;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

/**
 * Base class for ImageInfo blocks.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all ImageInfo
 * Block objects.
 */
abstract class BlockBase extends ElementBase
{
    /**
     * The Collection of this Block.
     *
     * @var \FileEye\ImageInfo\core\Collection
     */
    protected $collection;

    /**
     * Constructs a Block object.
     *
     * @param \FileEye\ImageInfo\core\Collection $collection
     *            The Collection of this Block.
     * @param \FileEye\ImageInfo\core\Block\BlockBase|null $parent
     *            (Optional) the parent Block of this Block.
     * @param \FileEye\ImageInfo\core\Block\BlockBase|null $reference
     *            (Optional) if specified, the new Block will be inserted
     *            before the reference Block.
     */
    public function __construct(Collection $collection, BlockBase $parent = null, BlockBase $reference = null)
    {
        $this->collection = $collection;
        parent::__construct($collection->getPropertyValue('DOMNode'), $parent, $reference);
    }

    /**
     * Loads data into an element.
     *
     * @param DataElement $data_element
     *            the data element that will provide the data.
     * @param int $offset
     *            (Optional) the offset within the data element where the
     *            block will be found.
     * @param int|null $size
     *            (Optional) the size of the data from the offset.
     *
     * @returns $this
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        throw new ImageInfoException("%s does not implement the %s method.", get_called_class(), __FUNCTION__);
    }

    /**
     * Gets the Collection of this Block.
     *
     * @return \FileEye\ImageInfo\core\Collection
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
