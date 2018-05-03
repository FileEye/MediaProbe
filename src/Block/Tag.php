<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Exception\TagException;
use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;
use ExifEye\core\Spec;

/**
 * Class representing an Exif TAG as an ExifEye block.
 */
class Tag extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'Tag';

    /**
     * Constructs a Tag block object.
     */
    public function __construct(Ifd $ifd, $id, $entry_class, $entry_arguments, $format = null, $components = null)
    {
        $this->setParentElement($ifd);

        $this->id = $id;
        $this->name = Spec::getTagName($this->getParentElement()->getId(), $id);
        $this->hasSpecification = $id > 0xF000 || in_array($id, Spec::getIfdSupportedTagIds($ifd->getId()));

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
        $expected_format = Spec::getTagFormat($this->getParentElement()->getId(), $id);
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
        $expected_components = Spec::getTagComponents($this->getParentElement()->getId(), $id);
        if ($expected_components !== null && $components !== null && $components !== $expected_components) {
            $this->warning("Found {components} data components, expected {expected_components}", [
                'components' => $components,
                'expected_components' => $expected_components,
            ]);
        }

        // Set the Tag's entry.
        $this->setEntry(new $entry_class($entry_arguments, $this));
        $this->debug("Text: {text}", [
            'text' => $this->getEntry()->toString(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getElementPathFragment()
    {
        $tag_path = $this->getType() . ':0x' . str_pad(dechex($this->getId()), 4, '0', STR_PAD_LEFT);
        $tag_path .= $this->getName() ? ':' . $this->getName() : '';
        return $tag_path;
    }

    /**
     * {@inheritdoc}
     */
    public static function loadFromData(BlockBase $parent, DataWindow $data_window, $offset, $options = [])
    {
        // Gets the TAG's elements from the data window.
        $id = $data_window->getShort($offset);
        $format = $data_window->getShort($offset + 2);
        $components = $data_window->getLong($offset + 4);
        $data_element = $data_window->getLong($offset + 8);

        // If the data size is bigger than 4 bytes, then actual data is not in
        // the TAG's data element, but at the the offset stored in the data
        // element.
        $size = Format::getSize($format) * $components;
        if ($size > 4) {
            $data_offset = $data_element;
            if (!$options['tagsAbsoluteOffset']) {
                $data_offset += $options['ifd_offset'];
            }
            $data_offset += $options['tagsSkipOffset'];
        } else {
            $data_offset = $offset + 8;
        }

        // Build and return the TAG object.
        $entry_class = Spec::getEntryClass($parent->getId(), $id, $format);
        $entry_arguments = call_user_func($entry_class . '::getInstanceArgumentsFromTagData', $format, $components, $data_window, $data_offset);
        $tag = new static($parent, $id, $entry_class, $entry_arguments, $format, $components);
        return $tag;
    }

    /**
     * Turn this entry into a string.
     *
     * @return string a string representation of this entry. This is
     *         mostly for debugging.
     */
    public function __toString()
    {
        if (!$this->getName()) {
            return '';
        }
        $entry_title = Spec::getTagTitle($this->getParentElement()->getId(), $this->getId()) ?: '*** UNKNOWN ***';
        return substr(str_pad($entry_title, 30, ' '), 0, 30) . ' = ' . $this->getEntry()->toString() . "\n";
    }
}
