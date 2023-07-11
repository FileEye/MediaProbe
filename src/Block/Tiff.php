<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Image;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataFormat;
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
    protected int $byteOrder;

    /**
     * Returns the MIME type of the image.
     *
     * @returns string
     */
    public function getMimeType(): string
    {
        return 'image/tiff';
    }

    public function setByteOrder(int $byteOrder): self
    {
        $this->byteOrder = $byteOrder;
        return $this;
    }

    public function getByteOrder(): int
    {
        return $this->byteOrder;
    }

    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data_element): void
    {
        // Determine the byte order of the TIFF data.
        $this->setByteOrder(self::getTiffSegmentByteOrder($data_element));
        $data_element->setByteOrder($this->getByteOrder());

        $this->debug('byte order: {byte_order} ({byte_order_description})', [
            'byte_order' => $this->getByteOrder() === ConvertBytes::LITTLE_ENDIAN ? 'II' : 'MM',
            'byte_order_description' => $this->getByteOrder() === ConvertBytes::LITTLE_ENDIAN ? 'Little Endian' : 'Big Endian',
        ]);

        // Starting IFD will be at offset 4 (2 bytes for byte order + 2 for header).
        $ifd_offset = $data_element->getLong(4);

        // If the offset to first IFD is higher than 8, then there may be an
        // image scan (TIFF) in between. Store that in a RawData block.
        if ($ifd_offset > 8) {
            $scan = new ItemDefinition(
                CollectionFactory::get('RawData', ['name' => 'scan']),
                DataFormat::BYTE,
                $ifd_offset - 8
            );
            $this->addBlock($scan)->parseData($data_element, 8, $ifd_offset - 8);
        }

        // Loops through IFDs. In fact we should only have IFD0 and IFD1.
        for ($i = 0; $i <= 1; $i++) {
            // Check data is accessible, warn otherwise.
            if ($ifd_offset >= $data_element->getSize() || $ifd_offset + 4 > $data_element->getSize()) {
                $this->warning(
                    'Could not determine number of entries for {item}, overflow',
                    ['item' => $this->getCollection()->getItemCollection($i)->getPropertyValue('name')]
                );
                continue;
            }

            // Find number of tags in IFD and warn if not enough data to read them.
            $ifd_tags_count = $data_element->getShort($ifd_offset);
            if ($ifd_offset + $ifd_tags_count * 4 > $data_element->getSize()) {
                $this->warning(
                    'Invalid data for {item}',
                    ['item' => $this->getCollection()->getItemCollection($i)->getPropertyValue('name')]
                );
                continue;
            }

            // Create and load the IFDs. Note that the data element cannot
            // be split in windows since any pointer will refer to the
            // entire segment space.
            $ifd_class = $this->getCollection()->getItemCollection($i)->getPropertyValue('class');
            $ifd_item = new ItemDefinition($this->getCollection()->getItemCollection($i), DataFormat::LONG, $ifd_tags_count, $ifd_offset, 0, $i);
            $ifd = new $ifd_class($ifd_item, $this);
            try {
                $ifd->parseData($data_element);
            } catch (DataException $e) {
                $this->error('Error processing {ifd_name}: {msg}.', [
                    'ifd_name' => $this->getCollection()->getItemCollection($i)->getPropertyValue('name'),
                    'msg' => $e->getMessage(),
                ]);
                continue;
            }

            // Offset to next IFD.
            $ifd_offset = $data_element->getLong($ifd_offset + $ifd_tags_count * 12 + 2);

            // If next IFD offset is 0 we are finished.
            if ($ifd_offset === 0) {
                break;
            }

            // IFD1 shouldn't link further.
            if ($i === 1) {
                $this->error('IFD1 should not link to another IFD');
                break;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        // TIFF byte order. 2 bytes running.
        if ($this->getByteOrder() == ConvertBytes::LITTLE_ENDIAN) {
            $bytes = 'II';
        } else {
            $bytes = 'MM';
        }

        // TIFF magic number --- fixed value. 4 bytes running.
        $bytes .= ConvertBytes::fromShort(self::TIFF_HEADER, $this->getByteOrder());

        // Check if we have a image scan before first IFD.
        $scan = $this->getElement("rawData");
        $ifd0 = $this->getElement("ifd[@name='IFD0']");
        $ifd1 = $this->getElement("ifd[@name='IFD1']");

        // IFD0 offset. Normally we start IFD0 at an offset of 8 bytes (2
        // bytes for byte order, another 2 bytes for the TIFF header, and 4
        // bytes for the IFD0 offset itself). If raw data is present, this
        // will come before IFD0. 8 bytes running.
        if (!$ifd0) {
            $bytes .= ConvertBytes::fromLong(0, $this->getByteOrder());
        } else {
            if ($scan) {
                $bytes .= ConvertBytes::fromLong(8 + strlen($scan->toBytes()), $this->getByteOrder());
            } else {
                $bytes .= ConvertBytes::fromLong(8, $this->getByteOrder());
            }
        }

        // Add image scan if needed. 8+scan bytes running.
        if ($scan) {
            $bytes .= $scan->toBytes();
        }

        // Dumps IFD0 and IFD1.
        if ($ifd0) {
            $bytes .= $ifd0->toBytes($this->getByteOrder(), strlen($bytes), (bool) $ifd1);
        }
        if ($ifd1) {
            $bytes .= $ifd1->toBytes($this->getByteOrder(), strlen($bytes), false);
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
    public static function isDataMatchingFormat(DataElement $data_element): bool
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
    public static function getTiffSegmentByteOrder(DataElement $data_element, int $offset = 0): ?int
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
    public function debugBlockInfo(?DataElement $data_element = null): void
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
