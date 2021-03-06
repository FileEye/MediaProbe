<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class to hold version information.
 */
class Version extends Undefined
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Version';

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        $this->setValue([$data_element->getBytes(0, $item_definition->getValuesCount())]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $this->parsed = true;

        if (!is_numeric($data[0])) {
            $this->error('Incorrect version data.');
            $this->parsed = false;
        }

        $this->value = $data[0];
        $this->components = strlen($this->value);
        $this->debug("text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if (in_array($format, ['phpExif', 'exiftool'])) {
            return $this->value;
        }
        if (isset($this->value) && is_numeric($this->value)) {
            $version = $this->value / 100;
        } else {
            $version = 0;
        }
        $major = floor($version);
        $minor = ($version - $major) * 100;

        return $version . ($minor === 0.0 ? '.0' : '');
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
        return $this->getValue();
    }
}
