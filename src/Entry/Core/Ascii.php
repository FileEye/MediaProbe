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
        $bytes = $data_element->getBytes();

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

        $this->debug("text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        $val = rtrim($this->value, "\x0");
        if ($format === 'exiftool') {
            $val = rtrim($val, " ");
            $first_zero_pos = strpos($val, "\x0");
            return substr($val, 0, $first_zero_pos === false ? strlen($val) : $first_zero_pos);
        }
        return $val === '' ? null : $val;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        if ($this->value === null || $this->value === '') {
            return "\x0";
        }
        return substr($this->value, -1) === "\x0" ? $this->value : $this->value . "\x0";
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $first_zero_pos = strpos($this->value, "\x0");
        $value = substr($this->value, 0, $first_zero_pos === false ? strlen($this->value) : $first_zero_pos);
        return $this->resolveText($value);
    }
}
