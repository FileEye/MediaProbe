<?php

namespace FileEye\MediaProbe\Parser\Tiff;

use FileEye\MediaProbe\Block\Tiff\Tiff as TiffBlock;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Parser\ParserBase;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for parsing TIFF data.
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
        $ifdOffset = $data->getLong(4);

        // If the offset to first IFD is higher than 8, then there may be an
        // image scan (TIFF) in between. Store that in a RawData block.
        if ($ifdOffset > 8) {
            $scan = new ItemDefinition(
                collection:  CollectionFactory::get('RawData', ['name' => 'scan']),
                format:      DataFormat::BYTE,
                valuesCount: $ifdOffset - 8,
            );
            $this->block->addBlock($scan)->parseData($data, 8, $ifdOffset - 8);
        }

        // Loops through IFDs. In fact we should only have IFD0 and IFD1.
        for ($i = 0; $i <= 1; $i++) {
            // Check data is accessible, warn otherwise.
            if ($ifdOffset >= $data->getSize() || $ifdOffset + 4 > $data->getSize()) {
                $this->block->warning(
                    'Could not determine number of entries for {item}, overflow',
                    ['item' => $this->block->getCollection()->getItemCollection($i)->getPropertyValue('name')]
                );
                continue;
            }

            // Find number of tags in IFD and warn if not enough data to read them.
            $ifdTagsCount = $data->getShort($ifdOffset);
            if ($ifdOffset + $ifdTagsCount * 4 > $data->getSize()) {
                $this->block->warning(
                    'Invalid data for {item}',
                    ['item' => $this->block->getCollection()->getItemCollection($i)->getPropertyValue('name')]
                );
                continue;
            }

            // Create and load the IFDs. Note that the data element cannot
            // be split in windows since any pointer will refer to the
            // entire segment space.
            $ifdClass = $this->block->getCollection()->getItemCollection($i)->getPropertyValue('class');
            $ifdItem = new ItemDefinition($this->block->getCollection()->getItemCollection($i), DataFormat::LONG, $ifdTagsCount, $ifdOffset, 0, $i);
            $ifd = new $ifdClass($ifdItem, $this->block);
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
            $ifdOffset = $data->getLong($ifdOffset + $ifdTagsCount * 12 + 2);

            // If next IFD offset is 0 we are finished.
            if ($ifdOffset === 0) {
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
     * @param DataElement $dataElement
     *   The data element to be checked.
     *
     * @return bool
     */
    public static function isDataMatchingMediaType(DataElement $dataElement): bool
    {
        return static::getTiffSegmentByteOrder($dataElement) !== null;
    }

    /**
     * Returns the byte order of a TIFF segment.
     *
     * @return int|null
     *   The byte order of the TIFF segment in case data is a TIFF block, null
     *   otherwise.
     */
    public static function getTiffSegmentByteOrder(DataElement $dataElement, int $offset = 0): ?int
    {
        // There must be at least 8 bytes available: 2 bytes for the byte
        // order, 2 bytes for the TIFF header, and 4 bytes for the offset to
        // the first IFD.
        if ($dataElement->getSize() - $offset < 8) {
            return null;
        }

        // Byte order.
        $orderString = $dataElement->getBytes($offset, 2);
        if ($orderString === 'II') {
            $order = ConvertBytes::LITTLE_ENDIAN;
        } elseif ($orderString === 'MM') {
            $order = ConvertBytes::BIG_ENDIAN;
        } else {
            return null;
        }

        // Verify the TIFF header.
        $magicString = $dataElement->getBytes($offset + 2, 2);
        if (ConvertBytes::toShort($magicString, $order) !== TiffBlock::TIFF_HEADER) {
            return null;
        }

        return $order;
    }
}
