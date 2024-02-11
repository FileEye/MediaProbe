<?php

namespace FileEye\MediaProbe\Parser\Jpeg;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Parser\ParserBase;

/**
 * Class for parsing a JPEG APP1 segment.
 */
class SegmentApp1 extends ParserBase
{
    public function parseData(DataElement $data): void
    {
        assert($this->block->debugInfo(['dataElement' => $data]));
        // If we have an Exif table, parse it.
        // @todo use parser and not class call driectly
        if (Exif::isExifSegment($data, 4)) {
            $exif = new ItemDefinition(CollectionFactory::get('Jpeg\Exif'));
            $this->block->addBlock($exif)->parseData($data, 4, $data->getSize() - 4);
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Exif data.
            $entry = new Undefined($this->block, $data);
            $entry->debug("Not an Exif segment. Parsed {text}", ['text' => $entry->toString()]);
        }
    }
}
