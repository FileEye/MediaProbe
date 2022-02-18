<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for storing raw data as a block.
 */
class RawData extends BlockBase
{
    /**
     * The data length.
     */
    protected $components;

    /**
     * xxx
     */
    public function getFormat()
    {
        return $this->getElement("entry") ? $this->getElement("entry")->getFormat() : DataFormat::UNDEFINED;
    }

    /**
     * Returns the data length.
     *
     * @return int
     */
    public function getComponents()
    {
        return $this->components; // xxx ???
    }

    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        new Undefined($this, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        return $this->getElement('entry')->toBytes();
    }

    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern()
    {
        if ($this->getAttribute('name') !== '') {
            return '/{DOMNode}:{name}';
        }
        return '/{DOMNode}';
    }
}
