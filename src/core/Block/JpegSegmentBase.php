<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

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
     * {@inheritdoc}
     */
    protected $type = 'jpegSegment';

    /**
     * The segment payload type.
     */
    protected $payload;

    /**
     * The expected segment data length, for fixed size payloads.
     */
    protected $components;

    /**
     * Construct a new JPEG segment object.
     */
    public function __construct($id, Jpeg $jpeg, JpegSegmentBase $reference = null)
    {
        parent::__construct($jpeg, $reference);
        $this->setAttribute('id', $id);
        $name = Spec::getElementName($jpeg->getType(), $id);
        $this->setAttribute('name', $name);
        $this->payload = Spec::getElementPropertyValue($jpeg->getType(), $id, 'payload');
        $this->components = Spec::getElementPropertyValue($jpeg->getType(), $id, 'components');
        $this->debug('{name} segment - {desc}', ['name' => $name, 'desc' => Spec::getElementTitle($jpeg->getType(), $id)]);
    }

    /**
     * Returns the segment payload type.
     *
     * @return int
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
    public function loadFromData(DataWindow $data_window, $offset = 0, $size = null, array $options = [])
    {
        if ($size) {
            $this->debug('Loading data in [{start}-{end}] [0x{hstart}-0x{hend}], {size} bytes ...', [
                'start' => $offset,
                'end' => $offset + $size - 1,
                'hstart' => strtoupper(dechex($offset)),
                'hend' => strtoupper(dechex($offset + $size - 1)),
                'size' => $size,
            ]);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        $bytes = $this->getMarkerBytes();

        // Add the payload.
        if ($entry = $this->getElement("entry")) {
            $bytes .= $entry->toBytes();
        }

        return $bytes;
    }

    /**
     * Returns the marker bytes for the segment.
     */
    protected function getMarkerBytes()
    {
        return chr(JpegSegment::JPEG_DELIMITER) . chr($this->getAttribute('id'));
    }
}
