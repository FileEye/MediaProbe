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
    public function loadFromData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

        // This segment is last before End Of Image, and its length needs to be
        // determined by finding the EOI marker backwards from the end of data.
        // Some images have some trailing (garbage?) following the EOI marker,
        // which we store in a RawData object.
        $scan_size = $data_element->getSize();
        while ($data_element->getByte($scan_size - 2) !== Jpeg::JPEG_DELIMITER || $data_element->getByte($scan_size - 1) != self::JPEG_EOI) {
            $scan_size --;
        }
        $scan_size -= 2;

        // Load data in an Undefined entry.
        $data_window = new DataWindow($data_element, 0, $scan_size);
        new Undefined($this, [$data_window->getBytes()]);

        // Append the EOI.
        $end_offset = $scan_size;
        $eoi_collection = $this->getParentElement()->getCollection()->getItemCollection(self::JPEG_EOI);
        $eoi_class = $eoi_collection->getPropertyValue('class');
        $eoi = new $eoi_class($eoi_collection, $this->getParentElement());
        $eoi_data_window = new DataWindow($data_element, $end_offset, 2);
        $eoi->loadFromData($eoi_data_window);
        $end_offset += $eoi_data_window->getSize();

        // Now check to see if there are any trailing data.
        if ($end_offset < $data_element->getSize()) {
            $raw_size = $data_element->getSize() - $end_offset;
            $this->warning('Found trailing content after EOI: {size} bytes', ['size' => $raw_size]);
            // There is no JPEG marker for trailing garbage, so we just collect
            // the data in a RawData object.
            $trail_definition = new ItemDefinition(Collection::get('RawData'), ItemFormat::BYTE, $raw_size);
            $trail_data_window = new DataWindow($data_element, $end_offset, $raw_size);
            $trail = new RawData($trail_definition, $this->getParentElement());
            $trail->loadFromData($trail_data_window);
        }

        $this->valid = true;
    }
}
