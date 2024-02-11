<?php

namespace FileEye\MediaProbe\Parser\Jpeg;

use FileEye\MediaProbe\Block\Jpeg\Jpeg as JpegBlock;
use FileEye\MediaProbe\Block\Jpeg\SegmentSos as SegmentSosBlock;
use FileEye\MediaProbe\Block\RawData;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Parser\ParserBase;
use FileEye\MediaProbe\Data\DataFormat;

/**
 * Class for parsing a JPEG SOS segment.
 */
class SegmentSos extends ParserBase
{
    public function parseData(DataElement $data): void
    {
        assert($this->block->debugInfo(['dataElement' => $data]));
        // This segment is last before End Of Image, and its length needs to be
        // determined by finding the EOI marker backwards from the end of data.
        // Some images have some trailing (garbage?) following the EOI marker,
        // which we store in a RawData object.
        $scan_size = $data->getSize();
        while ($data->getByte($scan_size - 2) !== JpegBlock::JPEG_DELIMITER || $data->getByte($scan_size - 1) != SegmentSosBlock::JPEG_EOI) {
            $scan_size --;
        }
        $scan_size -= 2;

        // Load data in an Undefined entry.
        $data_window = new DataWindow($data, 0, $scan_size);
        new Undefined($this->block, $data_window);

        // Append the EOI.
        $end_offset = $scan_size;
        $eoi = new ItemDefinition(
            $this->block->getParentElement()->getCollection()->getItemCollection(SegmentSosBlock::JPEG_EOI)
        );
        $this->block->getParentElement()->addBlock($eoi)->parseData($data, $end_offset, 2);
        $end_offset += 2;

        // Now check to see if there are any trailing data.
        if ($end_offset < $data->getSize()) {
            $raw_size = $data->getSize() - $end_offset;
            $this->block->warning('Found trailing content after EOI: {size} bytes', ['size' => $raw_size]);
            // There is no JPEG marker for trailing garbage, so we just collect
            // the data in a RawData object.
            $trail_definition = new ItemDefinition(CollectionFactory::get('RawData'), DataFormat::BYTE, $raw_size);
            $trail_data_window = new DataWindow($data, $end_offset, $raw_size);
            $trail = new RawData($trail_definition, $this->block->getParentElement());
            $trail->parseData($trail_data_window);
        }
    }
}
