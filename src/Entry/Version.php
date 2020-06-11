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
        $version = $data_element->getBytes(0, $item_definition->getValuesCount());
// xx        $value = is_numeric($version) ? [$version / 100] : [$version];
// xx        $this->setValue($value);
        $this->setValue([$version]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $this->valid = true;

/*        $version = isset($data[0]) ? $data[0] : 0.0;
        if (!is_numeric($version)) {
            $this->error('Incorrect version data.');
            $version = 0;
            $this->valid = false;
        }
        $major = floor($version);
        $minor = ($version - $major) * 100;
        $bytes = sprintf('%02.0f%02.0f', $major, $minor);

        $this->value = (string) ($version . ($minor === 0.0 ? '.0' : ''));
        $this->components = strlen($bytes);*/

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
        if ($format === 'phpExif') {
            return $this->toBytes();
        }
        if (isset($this->value) && is_numeric($this->value)) {
            $version = $this->value / 100;
        } else {
            $this->error('Incorrect version data.');
            $version = 0;
        }
        $major = floor($version);
        $minor = ($version - $major) * 100;
//        $bytes = sprintf('%02.0f%02.0f', $major, $minor);

        return (string) ($version . ($minor === 0.0 ? '.0' : ''));
        //return parent::getValue();
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
/*        $major = floor($this->getValue());
        $minor = ($this->getValue() - $major) * 100;
        return sprintf('%02.0f%02.0f', $major, $minor);*/
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
