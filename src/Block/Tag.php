<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
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
    public function __construct($ifd_id, $id, $format, $components, $data_element = null)
    {
        $this->id = $id;
        $this->format = $format;
        $this->components = $components;
        $this->dataElement = $data_element;

        $this->ifdId = $ifd_id;

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
        $id = $data_window->getShort($offset);
        $format = $data_window->getShort($offset + 2);
        $components = $data_window->getLong($offset + 4);
        $data_element = $data_window->getLong($offset + 8);

        return new static($ifd_id, $id, $format, $components, $data_element);
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
        if (isset($this->entry)){
            $str .= $this->entry->__toString();
        }
        $str .= ExifEye::fmt("    Value     : %s\n", print_r($this->xxgetValue(), true));
        $str .= ExifEye::fmt("    Text      : %s\n", $this->xxGetText());
        return $str;
    }
}
