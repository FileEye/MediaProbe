<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
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
        $this->setValue([$data_element->getBytes(0, $item_definition->getValuesCount())]);
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
        $this->value = $data[0];
        $this->components = strlen($this->value);

        if (strlen($this->value) < 8) {
            $this->valid = false;
        } else {
            $encoding = strtoupper(rtrim(substr($this->value, 0, 8), "\x00"));
            if (in_array($encoding, ['', 'ASCII', 'JIS', 'UNICODE'])) {
              $this->valid = true;
            }
        }

        if (!$this->valid) {
            $this->error('Invalid EXIF text encoding for UserComment.');
        }

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
            $encoding = rtrim(substr($this->value, 0, 8), "\x00");
            $value = rtrim(substr($this->value, 8), " \x00");
            if (strlen($value) === 0 && substr($this->value, 8, 1) === ' ') {
                $value = ' ';
            }
            return str_pad($encoding, 8, chr(0)) . str_pad($value, strlen($this->value) - 8, chr(0));
        }
        return rtrim(substr($this->value, 8), "\x00");
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->valid ? $this->getValue($options) : '';
    }
}
