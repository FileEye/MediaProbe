<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataException;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Image;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Spec;

/**
 * Class for handling TIFF data.
 */
class Tiff extends BlockBase
{
    /**
     * TIFF header.
     *
     * This must follow after the two bytes indicating the byte order.
     */
    const TIFF_HEADER = 0x002A;

    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'tiff';

    /**
     * Constructs a Block for holding a TIFF image.
     */
    public function __construct(BlockBase $parent = null)
    {
        parent::__construct('tiff', $parent);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        // Determine the byte order of the TIFF data.
        $byte_order = self::getTiffSegmentByteOrder($data_element, $offset);

        // Open a data window on the TIFF data.
        $data_window = new DataWindow($data_element, $offset, $size, $byte_order);
        $data_window->debug($this);

        // Starting IFD will be at offset 4 (2 bytes for byte order + 2 for
        // header)
        $ifd_offset = $data_window->getLong(4);

        // Loops through IFDs. In fact we should only have IFD0 and IFD1.
        for ($i = 0; $i <= 2; $i++) {
            // IFD1 shouldn't link further.
            if ($ifd_offset === 2) {
                $this->error('IFD1 links to another IFD.');
                break;
            }

            try {
                // Create and load the IFDs.
                $ifd_type = Spec::getElementType($this->getType(), $i);
                $ifd_name = Spec::getElementName($this->getType(), $i);
                $ifd_class = Spec::getElementHandlingClass($this->getType(), $i);
                $ifd_tags_count = $data_window->getShort($ifd_offset);
                $ifd = new $ifd_class($ifd_type, $ifd_name, $this);
                $this->debug('{ifd_name} at offset {ifd_offset} with {ifd_tags_count} tags.', [
                    'ifd_name' => $ifd_name,
                    'ifd_offset' => $ifd_offset,
                    'ifd_tags_count' => $ifd_tags_count,
                ]);
                $ifd->loadFromData($data_window, $ifd_offset, $size);

                // Offset to next IFD.
                $ifd_offset = $data_window->getLong($ifd_offset + $ifd_tags_count * 12 + 2);
            } catch (DataException $e) {
                $this->error('Error processing {ifd_name}: {msg}.', [
                    'ifd_name' => $ifd_name,
                    'msg' => $e->getMessage(),
                ]);
                break;
            }

            // If next IFD offset is 0 we are finished.
            if ($ifd_offset === 0) {
                break;
            }
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN)
    {
        if ($order == ConvertBytes::LITTLE_ENDIAN) {
            $bytes = 'II';
        } else {
            $bytes = 'MM';
        }

        // TIFF magic number --- fixed value.
        $bytes .= ConvertBytes::fromShort(self::TIFF_HEADER, $order);

        $ifd0 = $this->getElement("ifd[@name='IFD0']");
        if ($ifd0) {
            // IFD0 offset. We will always start IFD0 at an offset of 8
            // bytes (2 bytes for byte order, another 2 bytes for the TIFF
            // header, and 4 bytes for the IFD0 offset make 8 bytes together).
            $bytes .= ConvertBytes::fromLong(8, $order);

            // The argument specifies the offset of this IFD. The IFD will
            // use this to calculate offsets from the entries to their data,
            // all those offsets are absolute offsets counted from the
            // beginning of the data.
            $ifd0_bytes = $ifd0->toBytes($order, 8);

            // Deal with IFD1.
            $ifd1 = $this->getElement("ifd[@name='IFD1']");
            if (!$ifd1) {
                // No IFD1, link to next IFD is 0.
                $bytes .= $ifd0_bytes['ifd_area'] . ConvertBytes::fromLong(0, $order) . $ifd0_bytes['data_area'];
            } else {
                $ifd0_length = strlen($ifd0_bytes['ifd_area']) + 4 + strlen($ifd0_bytes['data_area']);
                $ifd1_offset = 8 + $ifd0_length;
                $bytes .= $ifd0_bytes['ifd_area'] . ConvertBytes::fromLong($ifd1_offset, $order) . $ifd0_bytes['data_area'];
                $ifd1_bytes = $ifd1->toBytes($order, $ifd1_offset);
                $bytes .= $ifd1_bytes['ifd_area'] . ConvertBytes::fromLong(0, $order) . $ifd1_bytes['data_area'];
            }
        } else {
            $bytes .= ConvertBytes::fromLong(0, $order);
        }

        return $bytes;
    }

    /**
     * Returns the MIME type of the image.
     *
     * @returns string
     */
    public function getMimeType()
    {
        return 'image/tiff';
    }

    /**
     * Determines if the data is a TIFF segment.
     */
    public static function getTiffSegmentByteOrder(DataElement $data_element, $offset = 0)
    {
        // There must be at least 8 bytes available: 2 bytes for the byte
        // order, 2 bytes for the TIFF header, and 4 bytes for the offset to
        // the first IFD.
        if ($data_element->getSize() - $offset < 8) {
            return null;
        }

        // Byte order.
        $order_string = $data_element->getBytes($offset, 2);
        if ($order_string === 'II') {
            $order = ConvertBytes::LITTLE_ENDIAN;
        } elseif ($order_string === 'MM') {
            $order = ConvertBytes::BIG_ENDIAN;
        } else {
            return null;
        }

        // Verify the TIFF header.
        $magic_string = $data_element->getBytes($offset + 2, 2);
        if (ConvertBytes::toShort($magic_string, $order) !== self::TIFF_HEADER) {
            return null;
        }

        return $order;
    }
}
