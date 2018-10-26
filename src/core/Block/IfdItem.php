<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Collection;

/**
 * A value object representing an Image File Directory (IFD) item.
 */
class IfdItem
{
    /**
     * The ExifEye collection this item is part of.
     *
     * @var int
     */
    protected $collection;

    /**
     * The id of the item.
     *
     * @var int
     */
    protected $id;

    /**
     * The format of the item.
     *
     * @var int
     */
    protected $format;

    /**
     * The components of the item.
     *
     * @var int
     */
    protected $components;

    /**
     * The data offset of the item.
     *
     * @var int
     */
    protected $dataOffset;

    /**
     * The block has an ExifEye specification description.
     *
     * @var bool
     */
    protected $hasDefinition = false;

    /**
     *   @todo
     */
    public function __construct($collection, $id, $format, $components = 1, $data_offset = null)
    {
        $this->collection = $collection;
        $this->id = $id;
        $this->format = $format;
        $this->components = $components;
        $this->dataOffset = $data_offset;

        $this->hasDefinition = $id > 0xF000 || in_array($id, Collection::getItemsIds($collection));
    }

    /**
     * @todo
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @todo
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @todo
     */
    public function getFormat()
    {
        return $this->format;
    }
    /**
     * @todo
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @todo
     */
    public function getDataOffset()
    {
        return $this->dataOffset;
    }

    /**
     * @todo
     */
    public function getSize()
    {
        return Collection::getFormatSize($this->getFormat()) * $this->getComponents();
    }

    /**
     * @todo
     */
    public function getType()
    {
        $type = Collection::getItemCollection($this->collection, $this->getId());
        return $type === null ? 'tag' : $type;
    }

    /**
     * @todo
     */
    public function getName()
    {
        return Collection::getItemName($this->collection, $this->getId());
    }

    /**
     * @todo
     */
    public function getClass()
    {
        $class = $this->getType() === 'tag' ? 'ExifEye\core\Block\Tag' : Collection::getItemClass($this->collection, $this->getId(), $this->getFormat());
        return $class;
    }

    /**
     * @todo
     */
    public function getEntryClass()
    {
        return Collection::getItemClass($this->collection, $this->getId(), $this->getFormat());
    }

    /**
     * @todo
     */
    public function getTitle()
    {
        return Collection::getItemPropertyValue($this->collection, $this->getId(), 'title');
    }

    /**
     * Determines if the Block has an ExifEye specification.
     *
     * @returns bool
     */
    public function hasDefinition()
    {
        return $this->hasDefinition;
    }
}
