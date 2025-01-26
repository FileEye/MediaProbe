<?php

namespace FileEye\MediaProbe\Block\Jpeg;

use FileEye\MediaProbe\Block\RawData;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;

/**
 * Class representing a JPEG SOS segment.
 */
class SegmentSos extends SegmentBase
{
    /**
     * JPEG EOI marker.
     */
    const JPEG_EOI = 0xD9;

    public function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));
        // This segment is last before End Of Image, and its length needs to be
        // determined by finding the EOI marker backwards from the end of data.
        // Some images have some trailing (garbage?) following the EOI marker,
        // which we store in a RawData object.
        $scan_size = $data->getSize();
        while ($data->getByte($scan_size - 2) !== Jpeg::JPEG_DELIMITER || $data->getByte($scan_size - 1) != static::JPEG_EOI) {
            $scan_size --;
        }
        $scan_size -= 2;

        // Load data in an Undefined entry.
        $data_window = new DataWindow($data, 0, $scan_size);
        new Undefined($this, $data_window);

        // Append the EOI.
        $end_offset = $scan_size;
        $eoi = new ItemDefinition(
            $this->getParentElement()->getCollection()->getItemCollection(static::JPEG_EOI)
        );
        $this->getParentElement()->addBlock($eoi)->parseData($data, $end_offset, 2);
        $end_offset += 2;

        // Now check to see if there are any trailing data.
        if ($end_offset < $data->getSize()) {
            $raw_size = $data->getSize() - $end_offset;
            $this->warning('Found trailing content after EOI: {size} bytes', ['size' => $raw_size]);
            // There is no JPEG marker for trailing garbage, so we just collect
            // the data in a RawData object.
            $trail_definition = new ItemDefinition(CollectionFactory::get('RawData'), DataFormat::BYTE, $raw_size);
            $trail_data_window = new DataWindow($data, $end_offset, $raw_size);
            $trail = new RawData($trail_definition, $this->getParentElement());
            $trail->parseData($trail_data_window);
        }
    }
}
