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
        $this->setValue($data_element->getBytes(0, min($data_element->getSize(), $item_definition->getValuesCount())));
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $raw = $data;
dump($data);
        $data = mb_convert_encoding($data[0], 'UTF-8', 'UCS-2LE');
dump($data);
        $php_string = rtrim($data, "\0");
dump($php_string);
        $windows_string = mb_convert_encoding($php_string, 'UCS-2LE', 'auto');
dump($windows_string);
        $this->components = strlen($windows_string) + 2;
        $this->value = [$php_string, $windows_string, $raw];

        $this->debug("text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * Returns the value of the string.
     *
     * @return array
     *            key 0 - the string in PHP format.
     *            key 1 - the string in Windows format (UCS-2LE).
     *            key 2 - the raw bytes.
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'phpExif') {
            return $this->value[2];
        }
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
