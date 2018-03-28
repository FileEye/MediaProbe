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

    protected $id;
    protected $format;
    protected $components;
    protected $value;
    protected $isOffset;

    /**
     * Constructs a Tag block object.
     */
    public function __construct($id, $format, $components, $value, $is_offset)
    {
        $this->id = $id;
        $this->format = $format;
        $this->components = $components;
        $this->value = $value;
        $this->isOffset = $is_offset;
    }

    /**
     * {@inheritdoc}
     */
    public static function loadFromData(DataWindow $data_window, $offset, $options = [])
    {
        $tag_id = $data_window->getShort($offset);
        $tag_format = $data_window->getShort($offset + 2);
        $tag_components = $data_window->getLong($offset + 4);
        $tag_value = $data_window->getLong($offset + 8);

        // The data size. If bigger than 4 bytes, the actual data is
        // not in the entry but somewhere else, with the offset stored
        // in the entry.
        $size = Format::getSize($tag_format) * $tag_components;
        $tag_value_is_offset = ($size > 4);

        // Provide sane defaults.
        $options = array_merge([
            'nesting_level' => 0,
            'current' => 1,
            'total' => 1,
            'ifd_id' => null,
        ], $options);
        ExifEye::debug(
            str_repeat("  ", $options['nesting_level']) . 'Tag 0x%04X: (%s) Fmt: %d (%s) Components: %d Value: %d%s (%d of %d)...',
            $tag_id,
            Spec::getTagName($options['ifd_id'], $tag_id),
            $tag_format,
            Format::getName($tag_format),
            $tag_components,
            $options['current'],
            $options['total'],
            $tag_value,
            $tag_value_is_offset ? ' (offset)' : ''
        );

        return new static($tag_id, $tag_format, $tag_components, $tag_value, $tag_value_is_offset);
    }

    public function getId()
    {
        return $this->id;
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
