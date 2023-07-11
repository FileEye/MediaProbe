<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Model\ElementBase;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\ItemDefinition;
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
     * The Definition of this Block.
     */
    protected ItemDefinition $definition;

    /**
     * The size of this Block in bytes.
     */
    protected int $size;

    /**
     * Constructs a Block object.
     *
     * @param \FileEye\MediaProbe\ItemDefinition $definition
     *            The Item Definition of this Block.
     * @param \FileEye\MediaProbe\Block\BlockBase|null $parent
     *            (Optional) the parent Block of this Block.
     * @param \FileEye\MediaProbe\Block\BlockBase|null $reference
     *            (Optional) if specified, the new Block will be inserted
     *            before the reference Block.
     */
    public function __construct(ItemDefinition $definition, BlockBase $parent = null, BlockBase $reference = null)
    {
        $this->definition = $definition;

        parent::__construct($this->getCollection()->getPropertyValue('DOMNode'), $parent, $reference);

        if ($this->getCollection()->hasProperty('item')) {
            $this->setAttribute('id', $this->getCollection()->getPropertyValue('item'));
        }
        if ($this->getCollection()->hasProperty('name')) {
            $this->setAttribute('name', $this->getCollection()->getPropertyValue('name'));
        }
    }

    /**
     * Resolves, in relation to the context, the index of the item collection to be used to instantiate the Block.
     *
     * @param int|null $components_count
     *   The number of components for the items.
     * @param ElementInterface $context
     *   An element that can be used to provide context.
     *
     * @return mixed
     *   The item collection index.
     */
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context): mixed
    {
        return 0;
    }

    /**
     * Gets the Definition of this Block.
     *
     * @return \FileEye\MediaProbe\ItemDefinition
     */
    public function getDefinition(): ItemDefinition
    {
        return $this->definition;
    }

    /**
     * Gets the Collection of this Block.
     *
     * @return \FileEye\MediaProbe\Collection
     */
    public function getCollection(): CollectionInterface
    {
        return $this->getDefinition()->getCollection();
    }

    // xx
    public function getFormat(): int
    {
        return $this->getDefinition()->getFormat();
    }

    /**
     * Parse data into a MediaProbe block.
     *
     * @param DataElement $data_element
     *   The data element that will provide the data.
     */
    public function parseData(DataElement $data_element, int $start = 0, ?int $size = null): void
    {
        $data = new DataWindow($data_element, $start, $size);
        $this->size = $data->getSize();
        $this->debugBlockInfo($data);
        $this->doParseData($data);

        // Invoke post-parse callbacks.
        $this->executePostParseCallbacks($data);
    }

    /**
     * Parse data into a MediaProbe block.
     *
     * @param DataElement $data_element
     *   The data element that will provide the data.
     */
    protected function doParseData(DataElement $data): void
    {
        throw new MediaProbeException("%s does not implement the %s method.", get_called_class(), __FUNCTION__);
    }

    /**
     * Invoke post-parse callbacks.
     *
     * @param \FileEye\MediaProbe\Data\DataElement $data_element
     *   @todo
     */
    protected function executePostParseCallbacks(DataElement $data_element): static
    {
        $post_load_callbacks = $this->getCollection()->getPropertyValue('postParse');
        if (!empty($post_load_callbacks)) {
            foreach ($post_load_callbacks as $callback) {
                call_user_func($callback, $data_element, $this);
            }
        }
        return $this;
    }

    /**
     * @todo xxx
     */
    public function addBlock(ItemDefinition $item_definition, ?BlockBase $parent = null, ?BlockBase $reference = null): BlockBase
    {
        $class = $item_definition->getCollection()->getPropertyValue('class');
        return new $class($item_definition, $parent ?? $this, $reference);
    }

    /**
     * Gets the size of this Block in bytes.
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0): string
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
    public function toDumpArray(): array
    {
        $attributes = [];
        if ($this->getAttribute('name') !== '') {
            $attributes['name'] = $this->getAttribute('name');
        }
        if ($this->getAttribute('id') !== '') {
            $attributes['id'] = $this->getAttribute('id');
        }
        $dump = array_merge(parent::toDumpArray(), $attributes, ['collection' => $this->getCollection()->getPropertyValue('id')]);
        // xx todo restore $dump = array_merge(parent::toDumpArray(), $this->getAttributes(), ['collection' => $this->getCollection()->getPropertyValue('id')]);
        foreach ($this->getMultipleElements("*") as $sub_element) {
            $dump['elements'][] = $sub_element->toDumpArray();
        }
        return $dump;
    }

    /**
     * {@inheritdoc}
     */
    public function debugBlockInfo(?DataElement $data_element = null): void
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
