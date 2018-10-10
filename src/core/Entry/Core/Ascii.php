<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class for holding a plain ASCII string.
 */
class Ascii extends EntryBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Ascii';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Ascii';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData(BlockBase $parent_block, $format, $components, DataWindow $data_window, $data_offset)
    {
        // Cap bytes to get to remaining data window size.
        $size = $data_window->getSize();
        if ($data_offset + $components > $size) {
            $bytes_to_get = $size - $data_offset;
            $parent_block->warning('Ascii entry reading {actual} bytes instead of {expected} to avoid data window overflow', [
                'actual' => $bytes_to_get,
                'expected' => $components,
            ]);
        } else {
            $bytes_to_get = $components;
        }
        $bytes = $data_window->getBytes($data_offset, $bytes_to_get);

        // Check the last byte is NULL.
        if (substr($bytes, -1) !== "\x0") {
            $parent_block->notice('Ascii entry missing final NUL character.');
        }

        return [$bytes];
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        parent::setValue($data);

        $str = isset($data[0]) ? $data[0] : '';

        $this->value = $str;
        if ($this->value === null || $this->value === '') {
            $this->components = 1;
        } else {
            $this->components = substr($this->value, -1) === "\x0" ? strlen($str) : strlen($str) + 1;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->toString();
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        if ($this->value === null || $this->value === '') {
            return "\x0";
        }
        return substr($this->value, -1) === "\x0" ? $this->value : $this->value . "\x0";
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        // xx @todo readd decoding
        $first_zero_pos = strpos($this->value, "\x0");
        return substr($this->value, 0, $first_zero_pos === false ? strlen($this->value) : $first_zero_pos);
    }
}
