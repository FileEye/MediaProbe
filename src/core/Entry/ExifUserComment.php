<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Format;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class for an EXIF user comment.
 *
 * This class is used to hold user comments, which can come in several different
 * character encodings.
 *
 * The string can be encoded with a different encoding, and if so, the encoding
 * must be given using the second argument. The Exif standard specifies three
 * known encodings: 'ASCII', 'JIS', and 'Unicode'. If the user comment is
 * encoded using a character encoding different from the tree known encodings,
 * then the empty string should be passed as encoding, thereby specifying that
 * the encoding is undefined.
 */
class ExifUserComment extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData(BlockBase $parent_block, $format, $components, DataWindow $data_window, $data_offset)
    {
        if ($components < 8) {
            return [];
        } else {
            return [$data_window->getBytes($data_offset + 8, $components - 8), rtrim($data_window->getBytes($data_offset, 8))];
        }
    }

    /**
     * Set the user comment.
     *
     * @param array $data
     *            key 0 - holds the comment.
     *            key 1 - holds a string with the encoding of the comment. This
     *            should be either 'ASCII', 'JIS', 'Unicode', or the empty
     *            string specifying an unknown encoding.
     */
    public function setValue(array $data)
    {
        $this->valid = true;

        $this->value = array_replace(['', 'ASCII'], $data);
        $this->components = 8 + strlen($this->value[0]);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        return str_pad($this->value[1], 8, chr(0)) . $this->value[0];
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->value[0];
    }
}
