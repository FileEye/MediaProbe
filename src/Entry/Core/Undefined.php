<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\Format;

/**
 * Class for holding data of undefined format.
 */
class Undefined extends EntryBase
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::UNDEFINED;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        return [$data_window->getBytes($data_offset, $components)];
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $this->value[0] = $data[0];
        $this->components = strlen($data[0]);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value[0];
    }

    /**
     * {@inheritdoc}
     */
    public function getBytes($byte_order = Convert::LITTLE_ENDIAN)
    {
        return $this->value[0];
    }

    /**
     * {@inheritdoc}
     */
    public function getText($short = false)
    {
        return '(undefined)';
    }
}
