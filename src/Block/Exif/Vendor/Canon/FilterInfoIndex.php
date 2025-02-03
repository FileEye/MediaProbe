<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\RawData;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing an index of values, for Canon Filter information.
 *
 * Data segment structure:
 *
 * Header   Count
 * D4000000 07000000
 *
 * Id       Lenght   P count  P#1 Idx  P#1 cnt  P#1 val  P#2 Idx  P#2 cnt  P#2 val  ...
 * 01000000 14000000 01000000 01010000 01000000 FFFFFFFF
 * 02000000 14000000 01000000 01020000 01000000 FFFFFFFF
 * 03000000 14000000 01000000 01030000 01000000 FFFFFFFF
 * 04000000 38000000 04000000 01040000 01000000 FFFFFFFF 02040000 01000000 00000000 03040000 01000000 00000000 04040000 01000000 00000000
 * 05000000 14000000 01000000 01050000 01000000 FFFFFFFF
 * 06000000 14000000 01000000 01060000 01000000 FFFFFFFF
 * 07000000 14000000 01000000 01070000 01000000 FFFFFFFF
 */
class FilterInfoIndex extends Index
{
    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        $offset = 0;

        // The count of filters is at offset 4.
        $this->components = $data->getLong($offset + 4);

        assert($this->debugInfo(['dataElement' => $data]));

        // The first 4 bytes is a marker (?), store as RawData.
        $rawData = $this->addBlock(new ItemDefinition(CollectionFactory::get('RawData', ['name' => 'filterHeader']), DataFormat::BYTE, 4));
        assert($rawData instanceof RawData);
        $rawData->parseData(new DataWindow($data, $offset, 4));
        $offset += 8;

        // Loop and parse through the filters.
        for ($i = 0; $i < $this->components; $i++) {
            $filter_size = $data->getLong($offset + 4);
            $filter = $this->addBlock(
                new ItemDefinition(
                    CollectionFactory::get('ExifMakerNotes\Canon\Filter'),
                    DataFormat::BYTE,
                    $filter_size,
                    $offset,
                    0,
                    $i
                )
            );
            assert($filter instanceof Filter);
            $filter->parseData(new DataWindow($data, $offset, $filter_size + 4));
            $offset += 4 + $filter_size;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents(): int
    {
        // Components to be passed to the parent IFD are the number of
        // signed longs in the segment, so determine it from the actual
        // bytes.
        $size = 2;
        foreach ($this->getMultipleElements('filter') as $filter) {
            $size += strlen($filter->toBytes()) / 4;
        }
        return $size;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
    {
        // Marker header.
        $bytes = $this->getElement("rawData[@name = 'filterHeader']")->toBytes($byte_order);

        // Number of filters.
        $filters = $this->getMultipleElements('filter');
        $bytes .= ConvertBytes::fromLong(count($filters), $byte_order);

        // The filters.
        foreach ($filters as $filter) {
            $bytes .= $filter->toBytes($byte_order);
        }

        return $bytes;
    }

    public function collectInfo(array $context = []): array
    {
        $info = [];
        $parentInfo = parent::collectInfo($context);
        $info['tags'] = $this->components;
        return array_merge($parentInfo, $info);
    }
}
