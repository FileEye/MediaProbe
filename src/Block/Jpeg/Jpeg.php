<?php

namespace FileEye\MediaProbe\Block\Jpeg;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Model\MediaTypeBlockInterface;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for handling an image/jpeg MIME type data.
 */
class Jpeg extends BlockBase implements MediaTypeBlockInterface
{
    /**
     * JPEG delimiter.
     */
    const JPEG_DELIMITER = 0xFF;

    /**
     * JPEG header.
     */
    const JPEG_HEADER = "\xFF\xD8\xFF";

    public static function isDataMatchingMediaType(DataElement $dataElement): bool
    {
        return $dataElement->getBytes(0, 3) === static::JPEG_HEADER;
    }

    public function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));

        // JPEG data is stored in big-endian format.
        $data->setByteOrder(ConvertBytes::BIG_ENDIAN);

        // Run through the data to parse the segments in the image. After each
        // segment is parsed, the offset will be moved forward, and after the
        // last segment we will terminate.
        $offset = 0;
        while ($offset < $data->getSize()) {
            // Get the next JPEG segment id offset.
            try {
                $newOffset = $this->getJpegSegmentIdOffset($data, $offset);
                $segmentId = $segmentId ?? 0;
                if ($newOffset !== $offset) {
                    // Add any trailing data from previous segment in a
                    // RawData block.
                    $this->error('Unexpected data found at end of JPEG segment {id}/{hexid} @ offset {offset}, size {size}', [
                        'id' => $segmentId,
                        'hexid' => '0x' . strtoupper(dechex($segmentId)),
                        'offset' => $data->getAbsoluteOffset($offset),
                        'size' => $newOffset - $offset,
                    ]);
                    $trail = new ItemDefinition(
                        CollectionFactory::get('RawData', ['name' => 'trail']),
                        DataFormat::BYTE,
                        $offset
                    );
                    $this->addBlock($trail)->parseData($data, $offset, $newOffset - $offset);
                }
                $offset = $newOffset;
            } catch (DataException $e) {
                $this->error($e->getMessage());
                return;
            }

            // Get the JPEG segment id.
            $segmentId = $data->getByte($offset + 1);

            // Warn if an unidentified segment is detected.
            if (!in_array($segmentId, $this->getCollection()->listItemIds())) {
                $this->warning('Invalid JPEG marker {id}/{hexid} found @ offset {offset}', [
                    'id' => $segmentId,
                    'hexid' => '0x' . strtoupper(dechex($segmentId)),
                    'offset' => $data->getAbsoluteOffset($offset),
                ]);
            }

            // Get the JPEG segment size.
            $segmentCollection = $this->getCollection()->getItemCollection($segmentId);
            $segmentSize = match ($segmentCollection->getPropertyValue('payload')) {
                // The data window size is the JPEG delimiter byte and the segment identifier byte.
                'none' => 2,
                // Read the length of the segment. The data window size includes the JPEG delimiter
                // byte, the segment identifier byte and two bytes used to store the segment
                // length.
                'variable' => $data->getShort($offset + 2) + 2,
                // The data window size includes the JPEG delimiter byte and the segment identifier
                // byte.
                'fixed' => $segmentCollection->getPropertyValue('components') + 2,
                // In case of image scan segment, the window is to the end of the data.
                'scan' => null,
            };

            // Parse the MediaProbe JPEG segment data.
            $segmentDefinition = new ItemDefinition($segmentCollection);
            $segment = $this->addBlock($segmentDefinition);
            $segment->parseData($data, $offset, $segmentSize);

            // Position to end of the segment.
            $offset += $segment->getSize();
        }

        // Fail if SOS is missing.
        if (!$this->getElement("jpegSegment[@name='SOS']")) {
            $this->error('Missing SOS (Start Of Scan) JPEG marker');
        }

        // Fail if EOI is missing.
        if (!$this->getElement("jpegSegment[@name='EOI']")) {
            $this->error('Missing EOI (End Of Image) JPEG marker');
        }
    }

    /**
     * Determines the offset where the next JPEG segment id is found.
     *
     * JPEG sections start with 0xFF. The first byte that is not 0xFF is a
     * marker (hopefully).
     *
     * @param DataElement $dataElement
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
    protected function getJpegSegmentIdOffset(DataElement $dataElement, int $offset): int
    {
        for ($i = $offset; $i < $offset + 128; $i++) {
            if ($dataElement->getByte($i) === static::JPEG_DELIMITER && $dataElement->getByte($i + 1) !== static::JPEG_DELIMITER) {
                return $i;
            }
        }
        throw new DataException('JPEG marker not found @%d', $dataElement->getAbsoluteOffset($offset));
    }
}
