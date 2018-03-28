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
    protected $type = 'TAG';

    protected $format;
    protected $components;
    protected $value;
    protected $isOffset;

    /**
     * Constructs a Tag block object.
     */
    public function __construct($ifd_id, $id, $format, $components, $value)
    {
        $this->id = $id;
        $this->format = $format;
        $this->components = $components;
        $this->value = $value;

        // The data size. If bigger than 4 bytes, the actual data is
        // not in the entry but somewhere else, with the offset stored
        // in the entry.
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
        $value = $data_window->getLong($offset + 8);

        return new static($ifd_id, $id, $format, $components, $value);
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getComponents()
    {
        return $this->components;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isOffset()
    {
        return $this->isOffset;
    }
}
