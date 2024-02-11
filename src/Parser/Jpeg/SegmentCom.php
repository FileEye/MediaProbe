<?php

namespace FileEye\MediaProbe\Parser\Jpeg;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Char;
use FileEye\MediaProbe\Parser\ParserBase;

/**
 * Class for parsing a JPEG comment segment.
 */
class SegmentCom extends ParserBase
{
    public function parseData(DataElement $data): void
    {
        assert($this->block->debugInfo(['dataElement' => $data]));
        // Adds the segment data as a Char string.
        new Char($this->block, new DataWindow($data, 4));
    }
}
