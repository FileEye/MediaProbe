<?php

namespace FileEye\ImageInfo\core\Block;

use FileEye\ImageInfo\core\Collection;
use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

/**
 * Abstract class for JPEG data segments.
 */
abstract class JpegSegmentBase extends BlockBase
{
    /**
     * JPEG delimiter.
     */
    const JPEG_DELIMITER = 0xFF;

    /**
     * The segment payload type.
     *
     * @var string
     */
    protected $payload;

    /**
     * The expected segment data length, for fixed size payloads.
     *
     * @var int
     */
    protected $components;

    /**
     * Construct a new JPEG segment object.
     */
    public function __construct(Collection $collection, Jpeg $jpeg, JpegSegmentBase $reference = null)
    {
        parent::__construct($collection, $jpeg, $reference);
        $this->setAttribute('id', $collection->getPropertyValue('item'));
        $name = $collection->getPropertyValue('name');
        $this->setAttribute('name', $name);
        $this->payload = $collection->getPropertyValue('payload');
        $this->components = $collection->getPropertyValue('components');
        $this->debug('{name} segment - {desc}', [
            'name' => $name,
            'desc' => $collection->getPropertyValue('title')
        ]);
    }

    /**
     * Returns the segment payload type.
     *
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Returns the segment data length.
     *
     * @return int
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        $bytes = $this->getMarkerBytes();

        // Add the payload.
        if ($entry = $this->getElement("entry")) {
            $bytes .= $entry->toBytes();
        }

        return $bytes;
    }

    /**
     * xxx todo
     */
    protected function getDataWindow(DataElement $data_element, $offset = 0, $size = null)
    {
        if ($size === null) {
            $size = $data_element->getSize();
        }

        $this->components = $size;

        if ($size) {
            $data_window = new DataWindow($data_element, $offset, $size, $data_element->getByteOrder());
            $data_window->logInfo($this->getLogger());
            return $data_window;
        }

        return null;
    }

    /**
     * Returns the marker bytes for the segment.
     */
    protected function getMarkerBytes()
    {
        return chr(JpegSegment::JPEG_DELIMITER) . chr($this->getAttribute('id'));
    }
}
