<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing an Exif TAG as an ExifEye block.
 */
class Tag extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'tag';

    /**
     * Constructs a Tag block object.
     */
    public function __construct(BlockBase $parent_block, IfdItem $ifd_item, ElementInterface $reference = null)
    {
        parent::__construct($ifd_item->getType(), $parent_block);

        $this->collection = $parent_block->getType();

        $this->setAttribute('id', $ifd_item->getId());

        if ($ifd_item->getName() !== null) {
            $this->setAttribute('name', $ifd_item->getName());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        if (isset($ifd_item)) {
            $this->debug("Tag: {tag}", [
                'tag' => $ifd_item->getTitle(),
            ]);
        }

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
