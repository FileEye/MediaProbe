<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementBase;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
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
        if ($collection->getPropertyValue('item') !== null) {
            $this->setAttribute('id', $collection->getPropertyValue('item'));
        }
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
//dump([MediaProbe::dumpHex($bytes, 50)]);
        return $bytes;
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        $attributes = [];
        if ($this->getAttribute('name') !== '') {
            $attributes['name'] = $this->getAttribute('name');
        }
        if ($this->getAttribute('id') !== '') {
            $attributes['id'] = $this->getAttribute('id');
        }
        $dump = array_merge(parent::toDumpArray(), $attributes, ['collection' => $this->getCollection()->getId()]);
        // xx todo restore $dump = array_merge(parent::toDumpArray(), $this->getAttributes(), ['collection' => $this->getCollection()->getId()]);
        foreach ($this->getMultipleElements("*") as $sub_element) {
            $dump['elements'][] = $sub_element->toDumpArray();
        }
        return $dump;
    }

    /**
     * {@inheritdoc}
     */
    public function debugBlockInfo(?DataElement $data_element = null)
    {
        $msg = '{node}';
        $node = $this->DOMNode->nodeName;
        $name = $this->getAttribute('name');
        if ($name ==! null) {
            $msg .= ':{name}';
        }
        $title = $this->getCollection()->getPropertyValue('title');
        if ($title ==! null) {
            $msg .= ' ({title})';
        }
        if ($data_element instanceof DataWindow) {
            $msg .= ' @{offset} size {size}';
            $offset = $data_element->getAbsoluteOffset() . '/0x' . strtoupper(dechex($data_element->getAbsoluteOffset()));
        } else {
            $msg .= ' size {size} byte(s)';
        }
        $this->debug($msg, [
            'node' => $node,
            'name' => $name,
            'title' => $title,
            'offset' => $offset ?? null,
            'size' => $data_element ? $data_element->getSize() : null,
        ]);
    }
}
