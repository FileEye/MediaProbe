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

        $this->validate($ifd_item);
    }

    /**
     * @todo
     */
    public function validate(IfdItem $ifd_item)
    {
        // Check if ExifEye has a definition for this TAG.
        if (!$ifd_item->hasDefinition()) {
            $this->notice("No specification for item {item} in {collection}", [
                'item' => $ifd_item->getId(),
                'collection' => $ifd_item->getCollection(),
            ]);
        } else {
            $this->debug("Tag: {tag}", [
                'tag' => $ifd_item->getTitle(),
            ]);

            // Warn if format is not as expected.
            $expected_format = Collection::getItemPropertyValue($ifd_item->getCollection(), $ifd_item->getId(), 'format');
            if ($expected_format !== null && $ifd_item->getFormat() !== null && !in_array($ifd_item->getFormat(), $expected_format)) {
                $expected_format_names = [];
                foreach ($expected_format as $expected_format_id) {
                    $expected_format_names[] = Collection::getFormatName($expected_format_id);
                }
                $this->warning("Found {format_name} data format, expected {expected_format_names}", [
                    'format_name' => Collection::getFormatName($ifd_item->getFormat()),
                    'expected_format_names' => implode(', ', $expected_format_names),
                ]);
            }

            // Warn if components are not as expected.
            $expected_components = Collection::getItemPropertyValue($ifd_item->getCollection(), $ifd_item->getId(), 'components');
            if ($expected_components !== null && $ifd_item->getComponents() !== null && $ifd_item->getComponents() !== $expected_components) {
                $this->warning("Found {components} data components, expected {expected_components}", [
                    'components' => $ifd_item->getComponents(),
                    'expected_components' => $expected_components,
                ]);
            }
        }
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
