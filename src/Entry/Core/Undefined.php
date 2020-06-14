<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for holding data of undefined format.
 */
class Undefined extends EntryBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Undefined';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Undefined';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        $this->setValue([$data_element->getBytes()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        parent::setValue($data);

        $this->value = $data[0];
        $this->components = strlen($data[0]);

        if ($this->hasMappedText()) {
            $this->debug("text: {text}", ['text' => $this->toString()]);
        }
        $this->debug("data: {data}", ['data' => MediaProbe::dumpHex($this->toBytes(), 12)]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $val = str_split($this->value);
            array_walk($val, function (&$value) {
              $value = ord($value);
            });
            return implode(' ', $val);
        }
        return parent::getValue($options);
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
        if ($this->components === 1) {
            $value = unpack('C', $this->value)[1]; // xx note that we may want to have alternative check for string... if the collection has a string index. see ifdExif/FileSource
        }
        $text = $this->hasMappedText() ? $this->getMappedText($value ?? null, null) : null;
        return $text ?? $this->components . ' byte(s) of data';
    }
}
