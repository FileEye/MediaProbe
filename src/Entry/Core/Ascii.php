<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\DataWindowOffsetException;
use ExifEye\core\Format;

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
        try {
            $bytes = $data_window->getBytes($data_offset, $components);
        } catch (DataWindowOffsetException $e) { // xx there's sth wrong in how the file output works
            $bytes = $data_window->getBytes($data_offset, $components - 1) . "\0";
        }

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
        $this->value[0] = $str;
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
    public function toBytes($byte_order = Convert::LITTLE_ENDIAN)
    {
        return $this->value[0] . chr(0x00);
    }

    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        return $this->getValue();
    }
}
