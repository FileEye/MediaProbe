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
use ExifEye\core\Spec;

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
    public function __construct($id, $format, $components, $data_offset, $collection = null, BlockBase $caller = null)
    {
        $this->collection = $collection;
        $this->id = $id;
        $this->format = $format;
        $this->components = $components;
        $this->dataOffset = $data_offset;

        $this->hasDefinition = $id > 0xF000 || in_array($id, Spec::getTypeSupportedElementIds($collection));

        if (!$caller) {
            return;
        }

        // Check if ExifEye has a definition for this TAG.
        if (!$this->hasDefinition()) {
            $caller->notice("No tag specification for tag {tagId} in ifd {ifdName}", [
                'tagId' => '0x' . strtoupper(dechex($id)),
                'ifdName' => $caller->getAttribute('name'),
            ]);
        } else {
            // Warn if format is not as expected.
            $expected_format = Spec::getElementPropertyValue($collection, $id, 'format');
            if ($expected_format !== null && $format !== null && !in_array($format, $expected_format)) {
                $expected_format_names = [];
                foreach ($expected_format as $expected_format_id) {
                    $expected_format_names[] = Spec::getFormatName($expected_format_id);
                }
                $caller->warning("Found {format_name} data format, expected {expected_format_names}", [
                    'format_name' => Spec::getFormatName($format),
                    'expected_format_names' => implode(', ', $expected_format_names),
                ]);
            }

            // Warn if components are not as expected.
            $expected_components = Spec::getElementPropertyValue($collection, $id, 'components');
            if ($expected_components !== null && $components !== null && $components !== $expected_components) {
                $caller->warning("Found {components} data components, expected {expected_components}", [
                    'components' => $components,
                    'expected_components' => $expected_components,
                ]);
            }
        }
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
        return Spec::getFormatSize($this->getFormat()) * $this->getComponents();
    }

    /**
     * @todo
     */
    public function getType()
    {
        $type = Spec::getElementType($this->collection, $this->getId());
        return $type === null ? 'tag' : $type;
    }

    /**
     * @todo
     */
    public function getName()
    {
        return Spec::getElementName($this->collection, $this->getId());
    }

    /**
     * @todo
     */
    public function getClass()
    {
        $class = $this->getType() === 'tag' ? 'ExifEye\core\Block\Tag' : Spec::getElementHandlingClass($this->collection, $this->getId(), $this->getFormat());
        return $class;
    }

    /**
     * @todo
     */
    public function getEntryClass()
    {
        return Spec::getElementHandlingClass($this->collection, $this->getId(), $this->getFormat());
    }

    /**
     * @todo
     */
    public function getTitle()
    {
        return Spec::getElementPropertyValue($this->collection, $this->getId(), 'title');
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
