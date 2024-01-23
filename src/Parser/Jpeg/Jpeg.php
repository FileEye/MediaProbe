<?php

namespace FileEye\MediaProbe\Parser\Jpeg;

use FileEye\MediaProbe\Block\Jpeg as JpegBlock;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Parser\ParserBase;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for handling a JPEG image data.
 */
class Jpeg extends ParserBase
{
    public function parseData(DataElement $data): void
    {
        assert($this->block->debugInfo(['dataElement' => $data]));

        // JPEG data is stored in big-endian format.
        $data->setByteOrder(ConvertBytes::BIG_ENDIAN);

        // Run through the data to parse the segments in the image. After each
        // segment is parsed, the offset will be moved forward, and after the
        // last segment we will terminate.
        $offset = 0;
        while ($offset < $data->getSize()) {
            // Get the next JPEG segment id offset.
            try {
                $new_offset = $this->getJpegSegmentIdOffset($data, $offset);
                $segment_id = $segment_id ?? 0;
                if ($new_offset !== $offset) {
                    // Add any trailing data from previous segment in a
                    // RawData block.
                    $this->block->error('Unexpected data found at end of JPEG segment {id}/{hexid} @ offset {offset}, size {size}', [
                        'id' => $segment_id,
                        'hexid' => '0x' . strtoupper(dechex($segment_id)),
                        'offset' => $data->getAbsoluteOffset($offset),
                        'size' => $new_offset - $offset,
                    ]);
                    $trail = new ItemDefinition(
                        CollectionFactory::get('RawData', ['name' => 'trail']),
                        DataFormat::BYTE,
                        $offset
                    );
                    $this->block->addBlock($trail)->parseData($data, $offset, $new_offset - $offset);
                }
                $offset = $new_offset;
            } catch (DataException $e) {
                $this->block->error($e->getMessage());
                return;
            }

            // Get the JPEG segment id.
            $segment_id = $data->getByte($offset + 1);

            // Warn if an unidentified segment is detected.
            if (!in_array($segment_id, $this->block->getCollection()->listItemIds())) {
                $this->block->warning('Invalid JPEG marker {id}/{hexid} found @ offset {offset}', [
                    'id' => $segment_id,
                    'hexid' => '0x' . strtoupper(dechex($segment_id)),
                    'offset' => $data->getAbsoluteOffset($offset),
                ]);
            }

            // Get the JPEG segment size.
            $segment_collection = $this->block->getCollection()->getItemCollection($segment_id);
            $segment_size = match ($segment_collection->getPropertyValue('payload')) {
                // The data window size is the JPEG delimiter byte and the segment identifier byte.
                'none' => 2,
                // Read the length of the segment. The data window size includes the JPEG delimiter
                // byte, the segment identifier byte and two bytes used to store the segment
                // length.
                'variable' => $data->getShort($offset + 2) + 2,
                // The data window size includes the JPEG delimiter byte and the segment identifier
                // byte.
                'fixed' => $segment_collection->getPropertyValue('components') + 2,
                // In case of image scan segment, the window is to the end of the data.
                'scan' => null,
            };

            // Parse the MediaProbe JPEG segment data.
            $segment_definition = new ItemDefinition($segment_collection);
            $segment = $this->block->addBlock($segment_definition);
            $segment->parseData($data, $offset, $segment_size);

            // Position to end of the segment.
            $offset += $segment->getSize();
        }

        // Fail if SOS is missing.
        if (!$this->block->getElement("jpegSegment[@name='SOS']")) {
            $this->block->error('Missing SOS (Start Of Scan) JPEG marker');
        }

        // Fail if EOI is missing.
        if (!$this->block->getElement("jpegSegment[@name='EOI']")) {
            $this->block->error('Missing EOI (End Of Image) JPEG marker');
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
        for ($i = $offset; $i < $offset + 128; $i++) {
            if ($data_element->getByte($i) === JpegBlock::JPEG_DELIMITER && $data_element->getByte($i + 1) !== JpegBlock::JPEG_DELIMITER) {
                return $i;
            }
        }
        throw new DataException('JPEG marker not found @%d', $data_element->getAbsoluteOffset($offset));
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
    public static function isDataMatchingMediaType(DataElement $data_element): bool
    {
        return $data_element->getBytes(0, 3) === JpegBlock::JPEG_HEADER;
    }
}
