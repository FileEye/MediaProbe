<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataElement;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\ExifEye;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

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
    protected $type = 'jpeg';

    /**
     * Constructs a Block for holding a JPEG image.
     */
    public function __construct(BlockBase $parent = null)
    {
        parent::__construct($parent);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        $this->debug('Parsing {size} bytes of JPEG data...', ['size' => $size]);

        // JPEG data is stored in big-endian format.
        $data_element->setByteOrder(ConvertBytes::BIG_ENDIAN);

        // Run through the data to read the segments in the image. After each
        // segment is read, the offset will be moved forward, and after the last
        // segment we will terminate.
        $segment_offset = $offset;
        while ($segment_offset < $size) {
            // Get next JPEG marker.
            $segment_offset = $this->getJpegMarkerOffset($data_element, $segment_offset);
            $segment_id = $data_element->getByte($segment_offset);

            // Warn if an unidentified segment is detected.
            if (!in_array($segment_id, Spec::getTypeSupportedElementIds($this->getType()))) {
                $this->warning('Invalid marker 0x{marker} found @ offset {offset}', [
                    'offset' => $segment_offset,
                    'marker' => strtoupper(dechex($segment_id)),
                ]);
            }

            $segment_offset++;

            // Create the ExifEye JPEG segment object.
            $segment_class = Spec::getElementHandlingClass($this->getType(), $segment_id);
            $segment = new $segment_class($segment_id, $this);

            // Get the JPEG segment size.
            $payload = Spec::getElementPropertyValue($this->getType(), $segment_id, 'payload');
            switch ($payload) {
                case 'none':
                    $segment_size = 0;
                    break;
                case 'variable':
                    // Read the length of the segment. The length includes the two
                    // bytes used to store the length.
                    $segment_size = $data_element->getShort($segment_offset);
                    break;
                case 'fixed':
                    $segment_size = Spec::getElementPropertyValue($this->getType(), $segment_id, 'components');
                    break;
            }

            // Load the ExifEye JPEG segment object.
            $segment->loadFromData($data_element, $segment_offset, $segment_size);

            // In case of image scan segment, the load is now complete.
            if ($segment->getPayload() === 'scan') {
                break;
            }

            // Position to end of the segment. It is defined by the current
            // offset + the bytes of the payload.
            $segment_offset += $segment->getComponents();
        }

        return $this;
    }

    /**
     * JPEG sections start with 0xFF. The first byte that is not 0xFF is a marker
     * (hopefully).
     *
     * @param DataElement $data_element
     * @param int $offset
     *
     * @return int
     */
    protected function getJpegMarkerOffset(DataElement $data_element, $offset)
    {
        for ($i = $offset; $i < $offset + 7; $i ++) {
            if ($data_element->getByte($i) !== JpegSegment::JPEG_DELIMITER) {
                return $i;
            }
        }
    }

    /**
     * Returns the MIME type of the image.
     *
     * @returns string
     */
    public function getMimeType()
    {
        return 'image/jpeg';
    }
}
