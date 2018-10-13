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
     * The byte order of this TIFF segment.
     *
     * @var int
     */
    protected $byteOrder;

    /**
     * Constructs a Block for holding a TIFF image.
     */
    public function __construct(BlockBase $parent = null)
    {
        parent::__construct('tiff', $parent);
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
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        // Determine the byte order of the TIFF data.
        $this->byteOrder = self::getTiffSegmentByteOrder($data_element, $offset);

        // Open a data window on the TIFF data.
        $data_window = new DataWindow($data_element, $offset, $size, $this->byteOrder);
        $data_window->debug($this);

        // Starting IFD will be at offset 4 (2 bytes for byte order + 2 for
        // header)
        $ifd_offset = $data_window->getLong(4);

        // If the offset to first IFD is higher than 8, then there may be an
        // image scan (TIFF) in between. Store that in a RawData block.
        if ($ifd_offset > 8) {
            $scan = new RawData('rawData', $this);
            $scan_data_window = new DataWindow($data_window, 8, $ifd_offset - 8);
            $scan_data_window->debug($scan);
            $scan->loadFromData($scan_data_window, 0, $scan_data_window->getSize());
        }

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
    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        // TIFF byte order. 2 bytes running.
        if ($this->byteOrder == ConvertBytes::LITTLE_ENDIAN) {
            $bytes = 'II';
        } else {
            $bytes = 'MM';
        }

        // TIFF magic number --- fixed value. 4 bytes running.
        $bytes .= ConvertBytes::fromShort(self::TIFF_HEADER, $this->byteOrder);

        // Check if we have a image scan before first IFD.
        $scan = $this->getElement("rawData");
        $ifd0 = $this->getElement("ifd[@name='IFD0']");
        $ifd1 = $this->getElement("ifd[@name='IFD1']");

        // IFD0 offset. Normally we start IFD0 at an offset of 8 bytes (2
        // bytes for byte order, another 2 bytes for the TIFF header, and 4
        // bytes for the IFD0 offset itself). If raw data is present, this
        // will come before IFD0. 8 bytes running.
        if (!$ifd0) {
            $bytes .= ConvertBytes::fromLong(0, $this->byteOrder);
        } else {
            if ($scan) {
                $bytes .= ConvertBytes::fromLong(8 + strlen($scan->toBytes()), $this->byteOrder);
            } else {
                $bytes .= ConvertBytes::fromLong(8, $this->byteOrder);
            }
        }

        // Add image scan if needed. 8+scan bytes running.
        if ($scan) {
            $bytes .= $scan->toBytes();
        }

        // Dumps IFD0 and IFD1.
        if ($ifd0) {
            $bytes .= $ifd0->toBytes($this->byteOrder, strlen($bytes), (bool) $ifd1);
        }
        if ($ifd1) {
            $bytes .= $ifd1->toBytes($this->byteOrder, strlen($bytes), false);
        }

        return $bytes;
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
