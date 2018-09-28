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
    protected $format = Format::ASCII;

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

        // Cut off string before the first NUL byte.
        $str = strstr($bytes, "\0", true);
        if ($str !== false) {
            return [$str];
        } else {
            $parent_block->notice('Ascii entry \'{bytes}\' missing final NUL character.', [
                'bytes' => $bytes,
            ]);
            return [$bytes];
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        parent::setValue($data);

        $str = isset($data[0]) ? $data[0] : '';

        $this->components = strlen($str) + 1;
        $this->value = $str;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        return $this->value . chr(0x00);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return parent::toString($options) ?: $this->getValue();
    }
}
