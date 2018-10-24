<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Block\IfdItem;
use ExifEye\core\Data\DataElement;
use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class for holding a plain ASCII string.
 */
class Ascii extends EntryBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Ascii';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Ascii';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        // Cap bytes to get to remaining data window size.
        $size = $data_element->getSize();
        if ($ifd_item->getDataOffset() + $ifd_item->getComponents() > $size) {
            $bytes_to_get = $size - $ifd_item->getDataOffset();
            $this->warning('Ascii entry reading {actual} bytes instead of {expected} to avoid data window overflow', [
                'actual' => $bytes_to_get,
                'expected' => $ifd_item->getComponents(),
            ]);
        } else {
            $bytes_to_get = $ifd_item->getComponents();
        }
        $bytes = $data_element->getBytes($ifd_item->getDataOffset(), $bytes_to_get);

        // Check the last byte is NULL.
        if (substr($bytes, -1) !== "\x0") {
            $this->notice('Ascii entry missing final NUL character.');
        }

        $this->setValue([$bytes]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        parent::setValue($data);

        $str = isset($data[0]) ? $data[0] : '';

        $this->value = $str;
        if ($this->value === null || $this->value === '') {
            $this->components = 1;
        } else {
            $this->components = substr($this->value, -1) === "\x0" ? strlen($str) : strlen($str) + 1;
        }

        $this->debug("Text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->toString();
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        if ($this->value === null || $this->value === '') {
            return "\x0";
        }
        return substr($this->value, -1) === "\x0" ? $this->value : $this->value . "\x0";
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        // xx @todo readd decoding
        $first_zero_pos = strpos($this->value, "\x0");
        return substr($this->value, 0, $first_zero_pos === false ? strlen($this->value) : $first_zero_pos);
    }
}
