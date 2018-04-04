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

    protected $format;
    protected $components;
    protected $dataElement;
    protected $isOffset;

    protected $ifdId;

    /**
     * Constructs a Tag block object.
     */
    public function __construct($ifd_id, $id, $format, $components, EntryInterface $entry, $data_element = null)
    {
        $this->ifdId = $ifd_id;

        $this->id = $id;
        $this->format = $format;
        $this->components = $components;
        $this->dataElement = $data_element;
        $this->entry = $entry;

        // The data size. If bigger than 4 bytes, the actual data is not in the
        // entry but somewhere else, with the offset stored in the entry.
        $size = Format::getSize($this->format) * $this->components;
        $this->isOffset = ($size > 4);

        $this->name = Spec::getTagName($ifd_id, $id);
        $this->hasSpecification = (bool) $this->name;
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
            throw new TagException(
                "Wrong data format '%s' for TAG '%s' in IFD '%s', expected '%s'",
                Format::getName($format),
                Spec::getTagName($ifd_id, $id),
                Spec::getIfdType($ifd_id),
                implode(', ', $expected_format_names)
            );
        }

        // Warn if components are not as expected.
        $expected_components = Spec::getTagComponents($ifd_id, $id);
        if ($expected_components !== null and $components !== $expected_components) {
            throw new TagException(
                "Unexpected number of data components '%d' for TAG '%s' in IFD '%s', expected '%d'",
                $components,
                Spec::getTagName($ifd_id, $id),
                Spec::getIfdType($ifd_id),
                $expected_components
            );
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
        }
        else {
            $data_offset = $offset + 8;
        }

        // Build an ExifEye Entry from the raw data.
        try {
            $class = Spec::getTagClass($ifd_id, $id, $format);
            $arguments = call_user_func($class . '::getInstanceArgumentsFromTagData', $format, $components, $data_window, $data_offset);
            $entry = new $class($arguments);

            // Build and return the TAG object.
            return new static($ifd_id, $id, $format, $components, $entry, $data_element);
        } catch (ExifEyeException $e) {
            // Throw the exception when running in strict mode, store
            // otherwise.
            ExifEye::maybeThrow($e);
            return null;
        }
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getComponents()
    {
        return $this->components;
    }

    public function getDataElement()
    {
        return $this->dataElement;
    }

    public function isOffset()
    {
        return $this->isOffset;
    }

    public function xxGetText($brief = false)
    {
        if (!isset($this->entry)) {
            return null;
        }
        return Spec::getTagText($this->ifdId, $this->id, $this->entry, $brief);
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
        $str .= ExifEye::fmt("    Format    : %d (%s)\n", $this->format, Format::getName($this->format));
        $str .= ExifEye::fmt("    Components: %d\n", $this->components);
        $str .= ExifEye::fmt("    Value     : %s\n", print_r($this->xxgetValue(), true));
        $str .= ExifEye::fmt("    Text      : %s\n", $this->xxGetText());
        return $str;
    }
}
