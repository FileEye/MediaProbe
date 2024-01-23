<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Dumper\DumperInterface;
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
abstract class BlockBase extends ElementBase implements BlockInterface
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
     * @param ItemDefinition $definition
     *   The Item Definition of this Block.
     * @param BlockInterface|null $parent
     *   (Optional) the parent Block of this Block.
     * @param BlockInterface|null $reference
     *   (Optional) if specified, the new Block will be inserted before the reference Block.
     */
    public function __construct(ItemDefinition $definition, BlockInterface $parent = null, BlockInterface $reference = null)
    {
        $this->definition = $definition;

        parent::__construct($this->getCollection()->getPropertyValue('DOMNode'), $parent, $reference);

        if ($this->getCollection()->hasProperty('item')) {
            $this->setAttribute('id', (string) $this->getCollection()->getPropertyValue('item'));
        }
        if ($this->getCollection()->hasProperty('name')) {
            $this->setAttribute('name', (string) $this->getCollection()->getPropertyValue('name'));
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
     * @param DataElement $dataElement
     *   The data element that will provide the data.
     */
    public function parseData(DataElement $dataElement, int $start = 0, ?int $size = null): void
    {
        $data = new DataWindow($dataElement, $start, $size);
        $this->size = $data->getSize();
        if ($this->getCollection()->hasProperty('parser')) {
            $parserClass = $this->getCollection()->getPropertyValue('parser');
            $parser = new $parserClass($this);
            $parser->parseData($data);
        } else {
            // @todo remove this when full parser model in place.
            $this->doParseData($data);
        }

        // Invoke post-parse callbacks.
        $this->executePostParseCallbacks($data);
    }

    /**
     * Invoke post-parse callbacks.
     *
     * @param \FileEye\MediaProbe\Data\DataElement $dataElement
     *   @todo
     */
    protected function executePostParseCallbacks(DataElement $dataElement): static
    {
        $post_load_callbacks = $this->getCollection()->getPropertyValue('postParse');
        if (!empty($post_load_callbacks)) {
            foreach ($post_load_callbacks as $callback) {
                call_user_func($callback, $dataElement, $this);
            }
        }
        return $this;
    }

    /**
     * @todo xxx
     */
    public function addBlock(ItemDefinition $item_definition, ?BlockInterface $parent = null, ?BlockInterface $reference = null): BlockInterface
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

    public function asArray(DumperInterface $dumper, array $context = []): array
    {
        return $dumper->dumpBlock($this, $context);
    }

    public function collectInfo(array $context = []): array
    {
        $info = [];

        $parentInfo = parent::collectInfo($context);

        $msg = '{node}';
        if (isset($parentInfo['name'])) {
            $msg .= ':{name}';
        }

        if (($title = $this->getCollection()->getPropertyValue('title')) ==! null) {
            $info['title'] = $title;
            $msg .= ' ({title})';
        }

        if (isset($context['dataElement'])) {
            $info['size'] = $context['dataElement']->getSize();
            if ($context['dataElement'] instanceof DataWindow) {
                $msg .= ' @{offset} size {size}';
                $info['offset'] = $context['dataElement']->getAbsoluteOffset() . '/0x' . strtoupper(dechex($context['dataElement']->getAbsoluteOffset()));
                // @todo $offset = MediaProbe::dumpIntHex($context['dataElement']->getAbsoluteOffset());
            } else {
                $msg .= ' size {size} byte(s)';
            }
        }

        $info['_msg'] = $msg;

        return array_merge($parentInfo, $info);
    }
}
