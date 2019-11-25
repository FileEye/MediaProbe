<?php

namespace FileEye\ImageProbe\core\Entry\Core;

use FileEye\ImageProbe\core\Data\DataElement;
use FileEye\ImageProbe\core\Block\IfdItem;
use FileEye\ImageProbe\core\ImageProbe;
use FileEye\ImageProbe\core\Utility\ConvertBytes;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $this->setValue([$data_element->getBytes($ifd_item->getDataOffset(), $ifd_item->getComponents())]);
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

        $this->debug("Text: {text}", ['text' => $this->toString()]);
        $this->debug("Data: {data}", ['data' => ImageProbe::dumpHex($this->toBytes(), 12)]);
        return $this;
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
        return parent::toString($options) ?: $this->components . ' bytes of data';
    }
}
