<?php

namespace FileEye\MediaProbe\Parser\Tiff;

use FileEye\MediaProbe\Block\Tiff as TiffBlock;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Image;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Parser\ParserBase;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for handling TIFF data.
 */
class Tiff extends ParserBase
{
    public function parseData(DataElement $data): void
    {
        // Determine the byte order of the TIFF data.
        $byteOrder = self::getTiffSegmentByteOrder($data);
        $this->block->setByteOrder($byteOrder);
        $data->setByteOrder($byteOrder);

        assert($this->block->debugInfo(['dataElement' => $data]));

        // Starting IFD will be at offset 4 (2 bytes for byte order + 2 for header).
        $ifd_offset = $data->getLong(4);

        // If the offset to first IFD is higher than 8, then there may be an
        // image scan (TIFF) in between. Store that in a RawData block.
        if ($ifd_offset > 8) {
            $scan = new ItemDefinition(
                collection:  CollectionFactory::get('RawData', ['name' => 'scan']),
                format:      DataFormat::BYTE,
                valuesCount: $ifd_offset - 8,
            );
            $this->block->addBlock($scan)->parseData($data, 8, $ifd_offset - 8);
        }

        // Loops through IFDs. In fact we should only have IFD0 and IFD1.
        for ($i = 0; $i <= 1; $i++) {
            // Check data is accessible, warn otherwise.
            if ($ifd_offset >= $data->getSize() || $ifd_offset + 4 > $data->getSize()) {
                $this->block->warning(
                    'Could not determine number of entries for {item}, overflow',
                    ['item' => $this->block->getCollection()->getItemCollection($i)->getPropertyValue('name')]
                );
                continue;
            }

            // Find number of tags in IFD and warn if not enough data to read them.
            $ifd_tags_count = $data->getShort($ifd_offset);
            if ($ifd_offset + $ifd_tags_count * 4 > $data->getSize()) {
                $this->block->warning(
                    'Invalid data for {item}',
                    ['item' => $this->block->getCollection()->getItemCollection($i)->getPropertyValue('name')]
                );
                continue;
            }

            // Create and load the IFDs. Note that the data element cannot
            // be split in windows since any pointer will refer to the
            // entire segment space.
            $ifd_class = $this->block->getCollection()->getItemCollection($i)->getPropertyValue('class');
            $ifd_item = new ItemDefinition($this->block->getCollection()->getItemCollection($i), DataFormat::LONG, $ifd_tags_count, $ifd_offset, 0, $i);
            $ifd = new $ifd_class($ifd_item, $this->block);
            try {
                $ifd->parseData($data);
            } catch (DataException $e) {
                $this->block->error('Error processing {ifd_name}: {msg}.', [
                    'ifd_name' => $this->block->getCollection()->getItemCollection($i)->getPropertyValue('name'),
                    'msg' => $e->getMessage(),
                ]);
                continue;
            }

            // Offset to next IFD.
            $ifd_offset = $data->getLong($ifd_offset + $ifd_tags_count * 12 + 2);

            // If next IFD offset is 0 we are finished.
            if ($ifd_offset === 0) {
                break;
            }

            // IFD1 shouldn't link further.
            if ($i === 1) {
                $this->block->error('IFD1 should not link to another IFD');
                break;
            }
        }
    }

    /**
     * Determines if the data is a TIFF image.
     *
     * @param DataElement $data_element
     *   The data element to be checked.
     *
     * @return bool
     */
    public static function isDataMatchingMediaType(DataElement $data_element): bool
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
        if (ConvertBytes::toShort($magic_string, $order) !== TiffBlock::TIFF_HEADER) {
            return null;
        }

        return $order;
    }

}
