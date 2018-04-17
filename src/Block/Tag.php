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

    protected $ifdId;

    /**
     * Constructs a Tag block object.
     */
    public function __construct($ifd_id, $id, EntryInterface $entry)
    {
        $this->ifdId = $ifd_id;

        $this->id = $id;

        $this->name = Spec::getTagName($ifd_id, $id);
        $this->hasSpecification = (bool) $this->name;

        $entry->setParentBlock($this);
        $this->setEntry($entry);
    }

    /**
     * {@inheritdoc}
     */
    public static function loadFromData(DataWindow $data_window, $offset, $options = [])
    {
        $ifd_id = isset($options['ifd_id']) ? $options['ifd_id'] : null;

        // Gets the TAG's elements from the data window.
        $id = $data_window->getShort($offset);
        $format = $data_window->getShort($offset + 2);
        $components = $data_window->getLong($offset + 4);
        $data_element = $data_window->getLong($offset + 8);

        // Warn if format is not as expected.
        $expected_format = Spec::getTagFormat($ifd_id, $id);
        if ($expected_format !== null and !in_array($format, $expected_format)) {
            $expected_format_names = [];
            foreach ($expected_format as $expected_format_id) {
                $expected_format_names[] = Format::getName($expected_format_id);
            }
            ExifEye::logger()->warning("Wrong data format '{format_name}' for TAG '{tag_name}' in IFD '{ifd_type}', expected '{expected_format_names}'", [
                'format_name' => Format::getName($format),
                'tag_name' => Spec::getTagName($ifd_id, $id),
                'ifd_type' => Spec::getIfdType($ifd_id),
                'expected_format_names' => implode(', ', $expected_format_names),
            ]);
        }

        // Warn if components are not as expected.
        $expected_components = Spec::getTagComponents($ifd_id, $id);
        if ($expected_components !== null and $components !== $expected_components) {
            ExifEye::logger()->warning("Unexpected number of data components: {components} for TAG '{tag_name}' in IFD '{ifd_type}', expected {expected_components}", [
                'components' => $components,
                'tag_name' => Spec::getTagName($ifd_id, $id),
                'ifd_type' => Spec::getIfdType($ifd_id),
                'expected_components' => $expected_components,
            ]);
        }

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

        // Build an ExifEye Entry from the raw data.
        $entry_class_name = Spec::getTagClass($ifd_id, $id, $format);
        $arguments = call_user_func($entry_class_name . '::getInstanceArgumentsFromTagData', $format, $components, $data_window, $data_offset);

        // Build and return the TAG object.
        $tag = new static($ifd_id, $id, new $entry_class_name($arguments), $format, $components, $data_element);
        return $tag;
    }

    public function getIfdId() // xx
    {
        return $this->ifdId;
    }

    /**
     * Turn this entry into a string.
     *
     * @return string a string representation of this entry. This is
     *         mostly for debugging.
     */
    public function __toString()
    {
        $entry_name = Spec::getTagName($this->ifdId, $this->id) ?: '*** UNKNOWN ***';
        $str = ExifEye::fmt("  Tag: 0x%04X (%s)\n", $this->id, $entry_name);
        $str .= ExifEye::fmt("    Format    : %d (%s)\n", $this->getEntry()->getFormat(), Format::getName($this->getEntry()->getFormat()));
        $str .= ExifEye::fmt("    Components: %d\n", $this->getEntry()->getComponents());
        $str .= ExifEye::fmt("    Value     : %s\n", print_r($this->getEntry()->getValue(), true));
        $str .= ExifEye::fmt("    Text      : %s\n", $this->getEntry()->toString());
        return $str;
    }
}
