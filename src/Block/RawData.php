<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Model\EntryBase;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for storing raw data as a block.
 */
class RawData extends BlockBase
{
    /**
     * The data length.
     */
    protected int $components;

    /**
     * xxx
     */
    public function getFormat(): int
    {
        $entry = $this->getElement("entry");
        if ($entry === null) {
            return DataFormat::UNDEFINED;
        }
        assert($entry instanceof EntryBase, get_class($entry));
        return $entry->getFormat();
    }

    /**
     * Returns the data length.
     *
     * @return int
     */
    public function getComponents(): int
    {
        return $this->components; // xxx ???
    }

    protected function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));
        new Undefined($this, $data);
    }

    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0): string
    {
        return $this->getElement('entry')->toBytes();
    }

    protected function getContextPathSegmentPattern(): string
    {
        if ($this->getAttribute('name') !== '') {
            return '/{DOMNode}:{name}';
        }
        return '/{DOMNode}';
    }
}
