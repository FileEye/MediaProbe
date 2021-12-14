<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        $bytes = $data_element->getBytes(0, min($data_element->getSize(), $item_definition->getValuesCount()));
        // Remove any question marks that have been introduced because of illegal characters.
        $value = str_replace('?', '', mb_convert_encoding($bytes, 'UTF-8', 'UCS-2LE'));
        $this->setValue([$value]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $php_string = rtrim($data[0], "\0");
        $windows_string = mb_convert_encoding($php_string, 'UCS-2LE', 'auto');
        $this->components = strlen($windows_string) + 2;
        $this->value = [$php_string, $windows_string];

        $this->debug("text: {text}", ['text' => $this->toString()]);

        $this->parsed = true;
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
        $format = $options['format'] ?? null;
        switch ($format) {
            case 'exiftool':
                return $this->toString();
            case 'phpExif':
                return mb_convert_encoding($this->value[0], '8bit');
            default:
                return $this->value;
        }
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
    public function toString(array $options = []): string
    {
        return $this->getValue()[0];
    }
}
