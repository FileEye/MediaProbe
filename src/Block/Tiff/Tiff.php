<?php

namespace FileEye\MediaProbe\Block\Tiff;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Model\MediaTypeBlockInterface;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for handling an image/tiff MIME type data.
 */
class Tiff extends BlockBase implements MediaTypeBlockInterface
{
    /**
     * TIFF header.
     *
     * This must follow after the two bytes indicating the byte order.
     */
    const TIFF_HEADER = 0x002A;

    /**
     * The byte order of this TIFF segment.
     */
    protected int $byteOrder;

    public function setByteOrder(int $byteOrder): self
    {
        $this->byteOrder = $byteOrder;
        return $this;
    }

    public function getByteOrder(): int
    {
        return $this->byteOrder;
    }

    public function doParseData(DataElement $data): void
    {
        // Determine the byte order of the TIFF data.
        $byteOrder = self::getTiffSegmentByteOrder($data);
        $this->setByteOrder($byteOrder);
        $data->setByteOrder($byteOrder);

        assert($this->debugInfo(['dataElement' => $data]));

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
            $this->addBlock($scan)->parseData($data, 8, $ifdOffset - 8);
        }

        // Loops through IFDs. In fact we should only have IFD0 and IFD1.
        for ($i = 0; $i <= 1; $i++) {
            // Check data is accessible, warn otherwise.
            if ($ifdOffset >= $data->getSize() || $ifdOffset + 4 > $data->getSize()) {
                $this->warning(
                    'Could not determine number of entries for {item}, overflow',
                    ['item' => $this->getCollection()->getItemCollection($i)->getPropertyValue('name')]
                );
                continue;
            }

            // Find number of tags in IFD and warn if not enough data to read them.
            $ifdTagsCount = $data->getShort($ifdOffset);
            if ($ifdOffset + $ifdTagsCount * 4 > $data->getSize()) {
                $this->warning(
                    'Invalid data for {item}',
                    ['item' => $this->getCollection()->getItemCollection($i)->getPropertyValue('name')]
                );
                continue;
            }

            // Create and load the IFDs. Note that the data element cannot
            // be split in windows since any pointer will refer to the
            // entire segment space.
            $ifdClass = $this->getCollection()->getItemCollection($i)->getPropertyValue('handler');
            $ifdItem = new ItemDefinition($this->getCollection()->getItemCollection($i), DataFormat::LONG, $ifdTagsCount, $ifdOffset, 0, $i);
            $ifd = new $ifdClass($ifdItem, $this);
            try {
                $ifd->parseData($data);
            } catch (DataException $e) {
                $this->error('Error processing {ifd_name}: {msg}.', [
                    'ifd_name' => $this->getCollection()->getItemCollection($i)->getPropertyValue('name'),
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

    public function collectInfo(array $context = []): array
    {
        $info = [];

        $parentInfo = parent::collectInfo($context);

        $info['_msg'] = $parentInfo['_msg'] . ' byte order {byteOrder} ({byteOrderDescription})';
        $info['byteOrder'] = $this->getByteOrder() === ConvertBytes::LITTLE_ENDIAN ? 'II' : 'MM';
        $info['byteOrderDescription'] = $this->getByteOrder() === ConvertBytes::LITTLE_ENDIAN ? 'Little Endian' : 'Big Endian';

        return array_merge($parentInfo, $info);
    }

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
        if (ConvertBytes::toShort($magicString, $order) !== static::TIFF_HEADER) {
            return null;
        }

        return $order;
    }
}
