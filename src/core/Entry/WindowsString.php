<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Entry\Core\Byte;
use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class used to manipulate strings in the format Windows XP uses.
 *
 * When examining the file properties of an image in Windows XP one can fill in
 * title, comment, author, keyword, and subject fields.
 * Filling those fields and pressing OK will result in the data being written
 * into the Exif data in the image.
 *
 * The data is written in a non-standard format and can thus not be loaded
 * directly --- this class is needed to translate it into normal PHP strings.
 */
class WindowsString extends Byte
{
      // xx @todo to be cleaned up as when back to byest is not identical

    /**
     * {@inheritdoc}
     */
    protected $name = 'WindowsString';

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        $data_offset = $options['data_offset'];
        $components = $options['components'];
        // Cap bytes to get to remaining data window size.
        $size = $data_element->getSize();
        if ($data_offset + $components > $size) {
            $bytes_to_get = $size - $data_offset;
            $parent_block->warning('WindowsString entry reading {actual} bytes instead of {expected} to avoid data window overflow', [
                'actual' => $bytes_to_get,
                'expected' => $components,
            ]);
            $bytes = $data_element->getBytes($data_offset, $bytes_to_get);
        } else {
            $bytes = $data_element->getBytes($data_offset, $components);
        }

        $this->setValue([mb_convert_encoding($bytes, 'UTF-8', 'UCS-2LE')]);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        parent::setValue($data);

        $php_string = rtrim($data[0], "\0");
        $windows_string = mb_convert_encoding($php_string, 'UCS-2LE', 'auto');
        $this->components = strlen($windows_string) + 2;
        $this->value = [$php_string, $windows_string];

        $this->debug("Text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * Returns the value of the string.
     *
     * @return array
     *            key 0 - the string in PHP format.
     *            key 1 - the string in Windows format (UCS-2LE).
     */
    public function getValue(array $options = [])
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
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
