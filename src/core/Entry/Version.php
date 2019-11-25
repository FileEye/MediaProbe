<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Block\BlockBase;
use FileEye\ImageProbe\core\Block\IfdItem;
use FileEye\ImageProbe\core\Data\DataElement;
use FileEye\ImageProbe\core\Entry\Core\EntryInterface;
use FileEye\ImageProbe\core\Entry\Core\Undefined;
use FileEye\ImageProbe\core\ImageProbe;
use FileEye\ImageProbe\core\Utility\ConvertBytes;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $version = $data_element->getBytes($ifd_item->getDataOffset(), $ifd_item->getComponents());
        $value = is_numeric($version) ? [$version / 100] : [$version];
        $this->setValue($value);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $this->valid = true;

        $version = isset($data[0]) ? $data[0] : 0.0;
        if (!is_numeric($version)) {
            $this->error('Incorrect version data.');
            $version = 0;
            $this->valid = false;
        }
        $major = floor($version);
        $minor = ($version - $major) * 100;
        $bytes = sprintf('%02.0f%02.0f', $major, $minor);

        $this->value = (string) ($version . ($minor === 0.0 ? '.0' : ''));
        $this->components = strlen($bytes);

        $this->debug("Text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        $major = floor($this->getValue());
        $minor = ($this->getValue() - $major) * 100;
        return sprintf('%02.0f%02.0f', $major, $minor);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->getValue();
    }
}
