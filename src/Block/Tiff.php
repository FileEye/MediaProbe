<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Image;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
     * The byte order of this TIFF segment.
     *
     * @var int
     */
    protected $byteOrder;

    /**
     * Returns the MIME type of the image.
     *
     * @returns string
     */
    public function getMimeType(): string
    {
        return 'image/tiff';
    }

    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        // Determine the byte order of the TIFF data.
        $this->byteOrder = self::getTiffSegmentByteOrder($data);
        $data->setByteOrder($this->byteOrder);

        $this->debug('byte order: {byte_order} ({byte_order_description})', [
            'byte_order' => $this->byteOrder === ConvertBytes::LITTLE_ENDIAN ? 'II' : 'MM',
            'byte_order_description' => $this->byteOrder === ConvertBytes::LITTLE_ENDIAN ? 'Little Endian' : 'Big Endian',
        ]);

        // Starting IFD will be at offset 4 (2 bytes for byte order + 2 for
        // header).
        $ifd_offset = $data->getLong(4);

        // If the offset to first IFD is higher than 8, then there may be an
        // image scan (TIFF) in between. Store that in a RawData block.
        if ($ifd_offset > 8) {
            $scan = new ItemDefinition(
                Collection::get('RawData', ['name' => 'scan']),
                ItemFormat::BYTE,
                $ifd_offset - 8
            );
            $this->addBlock($scan)->parseData($data, 8, $ifd_offset - 8);
        }

        // Loops through IFDs. In fact we should only have IFD0 and IFD1.
        for ($i = 0; $i <= 2; $i++) {
            // IFD1 shouldn't link further.
            if ($ifd_offset === 2) {
                $this->error('IFD1 should not link to another IFD');
                break;
            }

            try {
                // Create and load the IFDs. Note that the data element cannot
                // be split in windows since any pointer will refer to the
                // entire segment space.
                $ifd_class = $this->getCollection()->getItemCollection($i)->getPropertyValue('class');
                $ifd_tags_count = $data->getShort($ifd_offset);
                $ifd_item = new ItemDefinition($this->getCollection()->getItemCollection($i), ItemFormat::LONG, $ifd_tags_count, $ifd_offset, 0, $i);
                $ifd = new $ifd_class($ifd_item, $this);
                $ifd->parseData($data);

                // Offset to next IFD.
                $ifd_offset = $data->getLong($ifd_offset + $ifd_tags_count * 12 + 2);
            } catch (DataException $e) {
                $this->error('Error processing {ifd_name}: {msg}.', [
                    'ifd_name' => $this->getCollection()->getItemCollection($i)->getPropertyValue('name'),
                    'msg' => $e->getMessage(),
                ]);
                break;
            }

            // If next IFD offset is 0 we are finished.
            if ($ifd_offset === 0) {
                break;
            }
        }
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
     * Determines if the data is a TIFF image.
     *
     * @param DataElement $data_element
     *   The data element to be checked.
     *
     * @return bool
     */
    public static function isDataMatchingFormat(DataElement $data_element)
    {
        return static::getTiffSegmentByteOrder($data_element) !== null;
    }

    /**
     * Returns the byte order of a TIFF segment.
     *
     * @return int|null
     *   The byte order of the TIFF segment in case data is a TIFF block, null
     *   otherwise.
     */
    public static function getTiffSegmentByteOrder(DataElement $data_element, int $offset = 0)
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

    /**
     * {@inheritdoc}
     */
    public function debugBlockInfo(?DataElement $data_element = null)
    {
        $msg = '{node}';
        $node = $this->DOMNode->nodeName;
        $name = $this->getAttribute('name');
        if ($name ==! null) {
            $msg .= ':{name}';
        }
        $title = $this->getCollection()->getPropertyValue('title');
        if ($title ==! null) {
            $msg .= ' ({title})';
        }
        if ($data_element instanceof DataWindow) {
            $msg .= ' @{offset} size {size}';
            $offset = $data_element->getAbsoluteOffset() . '/0x' . strtoupper(dechex($data_element->getAbsoluteOffset()));
        } else {
            $msg .= ' size {size} byte(s)';
        }
        $this->debug($msg, [
            'node' => $node,
            'name' => $name,
            'title' => $title,
            'offset' => $offset ?? null,
            'size' => $data_element ? $data_element->getSize() : null,
        ]);
    }
}
