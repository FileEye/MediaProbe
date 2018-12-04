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
use ExifEye\core\ExifEyeException;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Collection;

/**
 * A value object representing an Image File Directory (IFD) item.
 */
class IfdItem
{
    /**
     * The ExifEye collection of this item.
     *
     * @var Collection
     */
    protected $collection;

    /**
     * The ExifEye collection this item is part of.
     *
     * @var Collection
     */
    protected $parentCollection;

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
     * Constructs an IfdItem object.
     */
    public function __construct(Collection $parent_collection, $id, $format = null, $components = 1, $data_offset = null, Collection $collection = null)
    {
        $this->parentCollection = $parent_collection;
        if ($collection) {
            $this->collection = $collection;
        } else {
            $this->collection = $parent_collection->getItemCollection($id);
        }
        if ($this->collection === null) {
            $overrides = [
                'item' => $id,
                'components' => $components,
                'name' => null,
            ];
            if (isset($format)) {
                $overrides['format'][] = $format;
            } else {
                $overrides['format'][] = IfdFormat::getFromName('SignedShort');
            }
            $this->collection = new Collection('tag', $overrides);
        }
        $this->id = $id;
        $this->format = $format;
        $this->components = $components;
        $this->dataOffset = $data_offset;

        $this->hasDefinition = $id > 0xF000 || in_array($id, $parent_collection->listItemIds());
    }

    /**
     * Validates the IfdItem against the specification if defined.
     */
    public function validate(ElementInterface $caller)
    {
        // Check if ExifEye has a definition for this TAG.
        if (!$this->hasDefinition()) {
            $caller->notice("No specification for item {item} in {collection}", [
                'item' => $this->getId(),
                'collection' => $this->getParentCollection()->getId(),
            ]);
        } else {
            $caller->debug("Tag: {tag}", [
                'tag' => $this->getTitle(),
            ]);

            // Warn if format is not as expected.
            $expected_format = $this->getCollection()->getPropertyValue('format');
            if ($expected_format !== null && $this->getFormat() !== null && !in_array($this->getFormat(), $expected_format)) {
                $expected_format_names = [];
                foreach ($expected_format as $expected_format_id) {
                    $expected_format_names[] = IfdFormat::getName($expected_format_id);
                }
                $caller->warning("Found {format_name} data format, expected {expected_format_names}", [
                    'format_name' => IfdFormat::getName($this->getFormat()),
                    'expected_format_names' => implode(', ', $expected_format_names),
                ]);
            }

            // Warn if components are not as expected.
            $expected_components = $this->getCollection()->getPropertyValue('components');
            if ($expected_components !== null && $this->getComponents() !== null && $this->getComponents() !== $expected_components) {
                $caller->warning("Found {components} data components, expected {expected_components}", [
                    'components' => $this->getComponents(),
                    'expected_components' => $expected_components,
                ]);
            }
        }
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
    public function getParentCollection()
    {
        return $this->parentCollection;
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
        return isset($this->format) ? $this->format : $this->collection->getPropertyValue('format')[0];
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
        return IfdFormat::getSize($this->getFormat()) * $this->getComponents();
    }

    /**
     * @todo
     */
    public function getType()
    {
        $type = $this->collection->getItemCollection($this->getId());
        return $type === null ? 'tag' : $type;
    }

    /**
     * @todo
     */
    public function getName()
    {
        if ($this->collection === null) {
            return null;
        }
        return $this->collection->getPropertyValue('name');
    }

    /**
     * @todo
     */
    public function getClass()
    {
        if ($this->collection === null) {
            $class = null;
        } else {
            $class = $this->collection->getPropertyValue('class');
        }
        if ($class !== null) {
            return $class;
        }
        return 'ExifEye\core\Block\Tag';
    }

    /**
     * @todo
     */
    public function getEntryClass()
    {
        if ($this->collection === null) {
            $entry_class = null;
        } else {
            $entry_class = $this->collection->getPropertyValue('entryClass');
        }
        if ($entry_class !== null) {
            return $entry_class;
        }

        // If format is not passed in, try getting it from the spec.
        $format = $this->getFormat();
        if (empty($format)) {
            throw new ExifEyeException(
                'No format can be derived for tag: 0x%04X (%s) in ifd: \'%s\'',
                $this->collection->getPropertyValue('item'),
                $this->collection->getPropertyValue('name'),
                $this->parentCollection->getId()
            );
        }

        $default_entry_class = IfdFormat::getClass($format);
        if (!$default_entry_class) {
            throw new ExifEyeException('Unsupported format: %d', $format);
        }
        return $default_entry_class;
    }

    /**
     * @todo
     */
    public function getTitle()
    {
        if ($this->collection === null) {
            return null;
        }
        return $this->collection->getPropertyValue('title');
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
