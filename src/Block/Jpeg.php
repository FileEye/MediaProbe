<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for handling a JPEG image data.
 */
class Jpeg extends BlockBase
{
    /**
     * JPEG delimiter.
     */
    const JPEG_DELIMITER = 0xFF;

    /**
     * JPEG header.
     */
    const JPEG_HEADER = "\xFF\xD8\xFF";

    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

        $this->valid = true;

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
                // xx todo --> fail if there's a gap in the offset
            }
            catch (DataException $e) {
                $this->error($e->getMessage());
                $this->valid = false;
                return;
            }

            // Get the JPEG segment id.
            $segment_id = $data_element->getByte($offset + 1);

            // Warn if an unidentified segment is detected.
            if (!in_array($segment_id, $this->getCollection()->listItemIds())) {
                $this->warning('Invalid JPEG marker {id}/{hexid} found @ offset {offset}', [
                    'id' => $segment_id,
                    'hexid' => '0x' . strtoupper(dechex($segment_id)),
                    'offset' => $data_element->getAbsoluteOffset($offset),
                ]);
            }

            // Get the JPEG segment size.
            $segment_collection = $this->getCollection()->getItemCollection($segment_id);
            switch ($segment_collection->getPropertyValue('payload')) {
                case 'none':
                    // The data window size is the JPEG delimiter byte and the
                    // segment identifier byte.
                    $segment_size = 2;
                    break;
                case 'variable':
                    // Read the length of the segment. The data window size
                    // includes the JPEG delimiter byte, the segment identifier
                    // byte and two bytes used to store the segment length.
                    $segment_size = $data_element->getShort($offset + 2) + 2;
                    break;
                case 'fixed':
                    // The data window size includes the JPEG delimiter byte
                    // and the segment identifier byte.
                    $segment_size = $segment_collection->getPropertyValue('components') + 2;
                    break;
                case 'scan':
                    // In case of image scan segment, the window is to the end
                    // of the data.
                    $segment_size = null;
                    break;
            }

            // Load the MediaProbe JPEG segment data.
            $segment = $this->addItem($segment_id);
            $segment_data_window = new DataWindow($data_element, $offset, $segment_size);
            $segment->parseData($segment_data_window);

            // Fail JPEG validity if the segment is invalid.
            if (!$segment->isValid()) {
                $this->valid = false;
            }

            // Position to end of the segment.
            $offset += $segment_data_window->getSize();
        }

        // Fail if EOI is missing.
        if (!$this->getElement("jpegSegment[@name='EOI']")) {
            $this->error('Missing EOI (End Of Image) JPEG marker');
            $this->valid = false;
        }
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
        for ($i = $offset; $i < $offset + 7; $i++) {
            if ($data_element->getByte($i) === Jpeg::JPEG_DELIMITER && $data_element->getByte($i + 1) !== Jpeg::JPEG_DELIMITER) {
                return $i;
            }
        }
        throw new DataException('JPEG marker not found @%d', $data_element->getAbsoluteOffset($offset));
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
