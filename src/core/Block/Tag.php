<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Collection;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing an Exif TAG as an ExifEye block.
 */
class Tag extends BlockBase
{
    /**
     * Constructs a Tag block object.
     */
    public function __construct(Collection $collection, IfdItem $ifd_item, BlockBase $parent, ElementInterface $reference = null)
    {
        parent::__construct($collection, $parent, $reference);

        $this->setAttribute('id', $ifd_item->getId());

        if ($ifd_item->getName() !== null) {
            $this->setAttribute('name', $ifd_item->getName());
        }

        $ifd_item->validate($this);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $class = $ifd_item->getEntryClass();
        $tag = new $class($this);
        try {
            $tag->loadFromData($data_element, $offset, $size, $options, $ifd_item);
        } catch (DataException $e) {
            $this->error($e->getMessage());
        }

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
