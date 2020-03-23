<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for handling a JPEG image data.
 */
class Jpeg extends BlockBase
{
    /**
     * JPEG header.
     */
    const JPEG_HEADER = "\xFF\xD8\xFF";

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element): void
    {
        $valid = true;

        // JPEG data is stored in big-endian format.
        $data_element->setByteOrder(ConvertBytes::BIG_ENDIAN);

        // Run through the data to read the segments in the image. After each
        // segment is read, the offset will be moved forward, and after the last
        // segment we will terminate.
        $offset = 0;
        while ($offset < $data_element->getSize()) {
            // Get the next JPEG segment id offset.
            try {
                $offset = $this->getJpegSegmentIdOffset($data_element, $offset);
            }
            catch (DataException $e) {
                $this->valid = false;
                return;
            }

            // Get the JPEG segment id.
            $segment_id = $data_element->getByte($offset);

            // Warn if an unidentified segment is detected.
            if (!in_array($segment_id, $this->getCollection()->listItemIds())) {
                $this->warning('Invalid JPEG marker {id}/{hexid} found @ offset {offset}', [
                    'id' => $id,
                    'hexid' => '0x' . strtoupper(dechex($id)),
                    'offset' => $data_element->getAbsoluteOffset($offset),
                ]);
            }

            $offset++;

            // Create the MediaProbe JPEG segment object.
            $segment_collection = $this->getCollection()->getItemCollection($segment_id);
            $segment_class = $segment_collection->getPropertyValue('class');
            $segment = new $segment_class($segment_collection, $this);
            $this->debug('{name} segment - {desc}', [
                'name' => $segment_collection->getPropertyValue('name'),
                'desc' => $segment_collection->getPropertyValue('title'),
            ]);

            // Get the JPEG segment size.
            switch ($segment_collection->getPropertyValue('payload')) {
                case 'none':
                    $segment_size = 0;
                    break;
                case 'variable':
                    // Read the length of the segment. The length includes the
                    // two bytes used to store the length.
                    $segment_size = $data_element->getShort($offset);
                    break;
                case 'fixed':
                    $segment_size = $segment_collection->getPropertyValue('components');
                    break;
            }

            $x = new DataWindow($data_element, $offset, $segment_size, $this->getLogger());
            // Load the MediaProbe JPEG segment data.
            $segment->loadFromData($data_element, $offset, $segment_size);

            // In case of image scan segment, the load is now complete.
            if ($segment->getPayload() === 'scan') {
                break;
            }

            // Position to end of the segment. It is defined by the current
            // offset + the bytes of the payload.
            $offset += $segment->getComponents();
        }

        $this->valid = $valid;
    }

    /**
     * Determines the offset where the next JPEG segment id is found.
     *
     * JPEG sections start with 0xFF. The first byte that is not 0xFF is a
     * marker (hopefully).
     *
     * @param DataElement $data_element
     *   The data element to be checked.
     * @param int $offset
     *   The starting offset in the data element.
     *
     * @return int
     *   The found offset.
     *
     * @throws DataException
     *   In case of marker not found.
     */
    protected function getJpegSegmentIdOffset(DataElement $data_element, int $offset): int
    {
        for ($i = $offset; $i < $offset + 7; $i ++) {
            if ($data_element->getByte($i) !== JpegSegment::JPEG_DELIMITER) {
                return $i;
            }
        }
        throw new DataException('JPEG marker not found @%d', $data_element->getAbsoluteOffset($offset)); // @todo ingest in logging
    }

    /**
     * Returns the MIME type of the image.
     *
     * @returns string
     */
    public function getMimeType(): string
    {
        return 'image/jpeg';
    }

    /**
     * Determines if the data is a JPEG image.
     *
     * @param DataElement $data_element
     *   The data element to be checked.
     *
     * @return bool
     *   TRUE if the data element is a JPEG image.
     */
    public static function isDataMatchingFormat(DataElement $data_element): bool
    {
        return $data_element->getBytes(0, 3) === static::JPEG_HEADER;
    }
}
