<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
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
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        $this->debug('Parsing {size} bytes of JPEG data...', ['size' => $data_window->getSize()]);

        // JPEG data is stored in big-endian format.
        $data_window->setByteOrder(ConvertBytes::BIG_ENDIAN);

        // Run through the data to read the segments in the image. After each
        // segment is read, the offset will be moved forward, and after the last
        // segment we will terminate.
        $i = $offset;
        while ($i < $data_window->getSize()) {
            // Get next JPEG marker.
            $i = $this->getJpegMarkerOffset($data_window, $i);
            $segment_id = $data_window->getByte($i);

            // Warn if an unidentified segment is detected.
            if (!in_array($segment_id, Spec::getTypeSupportedElementIds($this->getType()))) {
                $this->warning('Invalid marker 0x{marker} found @ offset {offset}', [
                    'offset' => $i,
                    'marker' => strtoupper(dechex($segment_id)),
                ]);
            }

            // Create and load the ExifEye JPEG segment object.
            $segment_class = Spec::getElementHandlingClass($this->getType(), $segment_id);
            $segment = new $segment_class($segment_id, $this);
            $segment->loadFromData($data_window, ++$i);

            // In case of image scan segment, the load is now complete.
            if ($segment->getPayload() === 'scan') {
                break;
            }

            // Position to end of the segment. It is defined by the current
            // offset + JPEG marker (2 bytes) + the bytes of the payload.
            $i += $segment->getComponents();
        }

        return $this;
    }

    /**
     * JPEG sections start with 0xFF. The first byte that is not 0xFF is a marker
     * (hopefully).
     *
     * @param DataWindow $data_window
     * @param int $offset
     *
     * @return int
     */
    protected function getJpegMarkerOffset($data_window, $offset)
    {
        for ($i = $offset; $i < $offset + 7; $i ++) {
            if ($data_window->getByte($i) !== JpegSegment::JPEG_DELIMITER) {
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
