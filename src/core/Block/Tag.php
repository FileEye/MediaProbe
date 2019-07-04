<?php

namespace FileEye\ImageInfo\core\Block;

use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\ElementInterface;
use FileEye\ImageInfo\core\Entry\Core\EntryInterface;
use FileEye\ImageInfo\core\ImageInfo;
use FileEye\ImageInfo\core\ImageInfoException;
use FileEye\ImageInfo\core\Collection;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

/**
 * Class representing an Exif TAG as an ImageInfo block.
 */
class Tag extends BlockBase
{
    // xx
    protected $ifdItem;

    /**
     * Constructs a Tag block object.
     */
    public function __construct(IfdItem $ifd_item, BlockBase $parent, ElementInterface $reference = null)
    {
        parent::__construct($ifd_item->getCollection(), $parent, $reference);

        $this->setAttribute('id', $ifd_item->getId());

        $name = $ifd_item->getCollection()->getPropertyValue('name');
        if ($name !== null) {
            $this->setAttribute('name', $name);
        }

        $ifd_item->validate($this);

        $this->ifdItem = $ifd_item;
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        $valid = true;

        if ($size === null) {
            $size = $data_element->getSize();
        }

        $class = $this->ifdItem->getEntryClass();
        $entry = new $class($this);
        try {
            $entry->loadFromData($data_element, $offset, $size, [], $this->ifdItem);
        } catch (DataException $e) {
            $this->error($e->getMessage());
            $valid = false;
        }

        $this->valid = $valid;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->getElement("entry")->getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getElement("entry")->toString($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        return $this->getElement("entry")->toBytes($order, $offset);
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->getElement("entry")->getFormat();
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        return $this->getElement("entry")->getComponents();
    }
}
