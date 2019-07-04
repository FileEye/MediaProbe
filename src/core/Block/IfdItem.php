<?php

namespace FileEye\ImageInfo\core\Block;

use FileEye\ImageInfo\core\Block\Tag;
use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\Data\DataException;
use FileEye\ImageInfo\core\ElementInterface;
use FileEye\ImageInfo\core\Entry\Core\EntryInterface;
use FileEye\ImageInfo\core\Entry\Core\Undefined;
use FileEye\ImageInfo\core\ImageInfo;
use FileEye\ImageInfo\core\ImageInfoException;
use FileEye\ImageInfo\core\Utility\ConvertBytes;
use FileEye\ImageInfo\core\Collection;

/**
 * A value object representing an Image File Directory (IFD) item.
 */
class IfdItem
{
    /**
     * The ImageInfo collection of this item.
     *
     * @var Collection
     */
    protected $itemCollection;

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
     * Constructs an IfdItem object.
     */
    public function __construct(Collection $item_collection, $format = null, $components = 1, $data_offset = null)
    {
        $this->itemCollection = $item_collection;
        $this->format = $format;
        $this->components = $components;
        $this->dataOffset = $data_offset;
    }

    /**
     * Validates the IfdItem against the specification if defined.
     */
    public function validate(ElementInterface $caller)
    {
        // Check if ImageInfo has a definition for this TAG.
        if (!$this->hasDefinition()) {
            $caller->notice("No specification for item {item} in '{ifd}'", [
                'item' => $this->getId(),
                'ifd' => $caller->getParentElement()->getCollection()->getPropertyValue('name'),
            ]);
        } else {
            $caller->debug("Item: {item}", [
                'item' => $this->getCollection()->getPropertyValue('title'),
            ]);

            // Warn if format is not as expected.
            $expected_format = $this->itemCollection->getPropertyValue('format');
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
            $expected_components = $this->itemCollection->getPropertyValue('components');
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
        return $this->itemCollection;
    }

    /**
     * @todo
     */
    public function getId()
    {
        return $this->itemCollection->getPropertyValue('item');
    }

    /**
     * @todo
     */
    public function getFormat()
    {
        return isset($this->format) ? $this->format : $this->itemCollection->getPropertyValue('format')[0];
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
    public function getClass()
    {
        $class = $this->itemCollection->getPropertyValue('class');
        if ($class !== null) {
            return $class;
        }
        return 'FileEye\ImageInfo\core\Block\Tag';
    }

    /**
     * @todo
     */
    public function getEntryClass()
    {
        $entry_class = $this->itemCollection->getPropertyValue('entryClass');
        if ($entry_class !== null) {
            return $entry_class;
        }

        // If format is not passed in, try getting it from the spec.
        $format = $this->getFormat();
        if (empty($format)) {
            throw new ImageInfoException(
                'No format can be derived for tag: 0x%04X (%s)',
                $this->itemCollection->getPropertyValue('item'),
                $this->itemCollection->getPropertyValue('name')
            );
        }

        $default_entry_class = IfdFormat::getClass($format);
        if (!$default_entry_class) {
            throw new ImageInfoException('Unsupported format: %d', $format);
        }
        return $default_entry_class;
    }

    /**
     * Determines if the Block has an ImageInfo specification.
     *
     * @returns bool
     */
    public function hasDefinition()
    {
        return $this->itemCollection->getId() !== '__NIL__';
    }
}
