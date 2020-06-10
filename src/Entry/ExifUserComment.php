<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        if ($item_definition->getValuesCount() < 8) {
            $this->setValue([]);
        } else {
            $this->setValue([$data_element->getBytes(8, $item_definition->getValuesCount() - 8), rtrim($data_element->getBytes(0, 8))]);
        }

        return $this;
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

        $this->debug("text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'phpExif') {
            return $this->toBytes();
        }
        return parent::getValue();
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
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
