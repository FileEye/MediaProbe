<?php

namespace FileEye\MediaProbe\Parser\Jpeg;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Parser\ParserBase;

/**
 * Class for parsing a generic JPEG data segment.
 */
class Segment extends ParserBase
{
    public function parseData(DataElement $data): void
    {
        assert($this->block->debugInfo(['dataElement' => $data]));
        // Adds the segment data as an Undefined entry.
        new Undefined($this->block, $data);
    }
}
