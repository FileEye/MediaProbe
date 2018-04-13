<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Byte;
use ExifEye\core\Entry\Exception\EntryException;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class used to manipulate strings in the format Windows XP uses.
 *
 * When examining the file properties of an image in Windows XP one
 * can fill in title, comment, author, keyword, and subject fields.
 * Filling those fields and pressing OK will result in the data being
 * written into the Exif data in the image.
 *
 * The data is written in a non-standard format and can thus not be
 * loaded directly --- this class is needed to translate it into
 * normal strings.
 *
 * It is important that entries from this class are only created with
 * the {@link PelTag::XP_TITLE}, {@link PelTag::XP_COMMENT}, {@link
 * PelTag::XP_AUTHOR}, {@link PelTag::XP_KEYWORD}, and {@link
 * PelTag::XP_SUBJECT} tags. If another tag is used the data will no
 * longer be correctly decoded when reloaded with PEL. (The data will
 * be loaded as an {@link Byte} entry, which isn't as useful.)
 */
class WindowsString extends Byte
{
    const ZEROES = "\x0\x0";

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
dump(['1', $bytes_to_get, $components, $bytes]);
//        if ($bytes_to_get < $components) {
//            $bytes = str_pad($bytes, $components, "\x0");
//        }

        $bytes = mb_convert_encoding($bytes, 'UTF-8', 'UCS-2LE');
dump(['2', $bytes]);

        return [$bytes];
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
/*        $str = $data[0];
        $zlen = strlen(static::ZEROES);
        $s = mb_convert_encoding($str, 'UCS-2LE', 'auto');

        if (substr($s, -$zlen, $zlen) != static::ZEROES) {
            $s .= static::ZEROES;
        }
        $l = strlen($s);*/

        $windows_string = mb_convert_encoding($data[0], 'UCS-2LE', 'auto');
        $this->components = strlen($windows_string) + 2;
        $this->value = [$data[0], $windows_string];
dump(['setValue', $data, $this, $this->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        return $this->getValue()[1] . "\x0\x0";
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue()[0];
    }
}
