<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\DataWindowOffsetException;
use ExifEye\core\Entry\Exception\EntryException;
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
    protected $format = Format::ASCII;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        // Cap bytes to get to remaining data window size.
        $size = $data_window->getSize();
        if ($data_offset + $components > $size - 1) {
            $bytes_to_get = $size - $data_offset - 1;
            ExifEye::maybeThrow(new EntryException('%s reading %d bytes instead of %d to avoid data window overflow', get_class(), $bytes_to_get, $components));
        } else {
            $bytes_to_get = $components;
        }
        $bytes = $data_window->getBytes($data_offset, $bytes_to_get);

        // cut off string after the first nul byte
        $canonicalString = strstr($bytes, "\0", true);
        if ($canonicalString !== false) {
            return [$canonicalString];
        } else {
            // TODO throw exception if string isn't nul-terminated
            return [$bytes];
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $str = isset($data[0]) ? $data[0] : '';

        $this->components = strlen($str) + 1;
        $this->value = $str;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        return $this->value . chr(0x00);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}
