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

    protected $bytes = ''; // xx

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
        if ($bytes_to_get < $components) {
            $bytes = str_pad($bytes, $components, "\x0");
        }

        $bytes = mb_convert_encoding($bytes, 'UTF-8', 'UCS-2LE');
dump(['2', $bytes]);

        return [$bytes];
    }

    /**
     * Set the version held by this entry.
     *
     * @param array $data
     *            key 0 - holds the new value of the entry.
     *            key 1 - is internal use only, tells that string is UCS-2LE
     *            encoded, as PHP fails to detect this encoding.
     */
    public function setValue(array $data)
    {
        $str = $data[0];
        $convert_encoding = isset($data[1]) ? $data[1] : false;
        $zlen = strlen(static::ZEROES);
        $s = mb_convert_encoding($str, 'UCS-2LE', 'auto');

        if (substr($s, -$zlen, $zlen) != static::ZEROES) {
            $s .= static::ZEROES;
        }
        $l = strlen($s);

        $this->components = $l;
        $this->value[0] = $s;
        $this->bytes = $s;
dump(['setValue', $data, $this]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value[0];
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        return $this->bytes;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return strstr($this->getValue(), "\0", true);
    }
}
