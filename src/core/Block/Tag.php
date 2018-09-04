<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataElement;
use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;
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
    protected $type = 'tag';

    /**
     * Constructs a Tag block object.
     */
    public function __construct(BlockBase $parent_block, $id, $entry_class, $entry_data, $format = null, $components = null)
    {
        parent::__construct($parent_block);

        $this->setAttribute('id', $id);
        $tag_name = Spec::getTagName($parent_block, $id);
        if ($tag_name !== null) {
            $this->setAttribute('name', $tag_name);
        }
        $this->hasSpecification = $id > 0xF000 || in_array($id, Spec::getIfdSupportedTagIds($parent_block));

        // Check if ExifEye has a definition for this TAG.
        if (!$this->hasSpecification()) {
            $this->notice("No tag info available; Format {format_name}, Components {components}", [
                'format_name' => Format::getName($format),
                'components' => $components,
            ]);
        } else {
            $this->debug("Format {format_name}, Components {components}", [
                'format_name' => Format::getName($format),
                'components' => $components,
            ]);
        }

        // Warn if format is not as expected.
        $expected_format = Spec::getTagFormat($parent_block, $id);
        if ($expected_format !== null && $format !== null && !in_array($format, $expected_format)) {
            $expected_format_names = [];
            foreach ($expected_format as $expected_format_id) {
                $expected_format_names[] = Format::getName($expected_format_id);
            }
            $this->warning("Found {format_name} data format, expected {expected_format_names}", [
                'format_name' => Format::getName($format),
                'expected_format_names' => implode(', ', $expected_format_names),
            ]);
        }

        // Warn if components are not as expected.
        $expected_components = Spec::getTagComponents($parent_block, $id);
        if ($expected_components !== null && $components !== null && $components !== $expected_components) {
            $this->warning("Found {components} data components, expected {expected_components}", [
                'components' => $components,
                'expected_components' => $expected_components,
            ]);
        }

        // Set the Tag's entry.
        $entry = new $entry_class($this, $entry_data);
        $this->debug("Text: {text}", [
            'text' => $entry->toString(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
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
    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN)
    {
    }
}
