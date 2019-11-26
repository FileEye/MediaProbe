<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        // Cap bytes to get to remaining data window size.
        $size = $data_element->getSize();
        if ($item_definition->getDataOffset() + $item_definition->getValuesCount() > $size) {
            $bytes_to_get = $size - $item_definition->getDataOffset();
            $this->warning('Ascii entry reading {actual} bytes instead of {expected} to avoid data window overflow', [
                'actual' => $bytes_to_get,
                'expected' => $item_definition->getValuesCount(),
            ]);
        } else {
            $bytes_to_get = $item_definition->getValuesCount();
        }
        $bytes = $data_element->getBytes($item_definition->getDataOffset(), $bytes_to_get);

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
        $first_zero_pos = strpos($this->value, "\x0");
        $value = substr($this->value, 0, $first_zero_pos === false ? strlen($this->value) : $first_zero_pos);
        $options['value'] = $value;
        return parent::toString($options) ?? $value;
    }
}
