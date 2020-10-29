<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a JPEG SOS segment.
 */
class JpegSegmentSos extends JpegSegmentBase
{
    /**
     * JPEG EOI marker.
     */
    const JPEG_EOI = 0xD9;

    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element, int $start = 0, ?int $size = null): void
    {
        $segment_data = new DataWindow($data_element, $start, $size);
        $this->debugBlockInfo($segment_data);

        // This segment is last before End Of Image, and its length needs to be
        // determined by finding the EOI marker backwards from the end of data.
        // Some images have some trailing (garbage?) following the EOI marker,
        // which we store in a RawData object.
        $scan_size = $segment_data->getSize();
        while ($segment_data->getByte($scan_size - 2) !== Jpeg::JPEG_DELIMITER || $segment_data->getByte($scan_size - 1) != self::JPEG_EOI) {
            $scan_size --;
        }
        $scan_size -= 2;

        // Load data in an Undefined entry.
        $data_window = new DataWindow($segment_data, 0, $scan_size);
        new Undefined($this, [$data_window->getBytes()]);

        // Append the EOI.
        $end_offset = $scan_size;
        $eoi_collection = $this->getParentElement()->getCollection()->getItemCollection(self::JPEG_EOI);
        $eoi_class = $eoi_collection->getPropertyValue('class');
        $eoi = new $eoi_class($eoi_collection, $this->getParentElement());
        $eoi_data_window = new DataWindow($segment_data, $end_offset, 2);
        $eoi->parseData($eoi_data_window);
        $end_offset += $eoi_data_window->getSize();

        // Now check to see if there are any trailing data.
        if ($end_offset < $segment_data->getSize()) {
            $raw_size = $segment_data->getSize() - $end_offset;
            $this->warning('Found trailing content after EOI: {size} bytes', ['size' => $raw_size]);
            // There is no JPEG marker for trailing garbage, so we just collect
            // the data in a RawData object.
            $trail_definition = new ItemDefinition(Collection::get('RawData'), ItemFormat::BYTE, $raw_size);
            $trail_data_window = new DataWindow($segment_data, $end_offset, $raw_size);
            $trail = new RawData($trail_definition, $this->getParentElement());
            $trail->parseData($trail_data_window);
        }

        $this->parsed = true;
    }
}
