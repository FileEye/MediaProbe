<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Map;
use FileEye\MediaProbe\Block\RawData;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
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
    public function parseData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

        $offset = 0;

        // The first 4 bytes is a marker (?), store as RawData.
        $this
            ->addItemWithDefinition(new ItemDefinition(Collection::get('RawData', ['name' => 'filterHeader']), ItemFormat::BYTE, 4))
            ->parseData(new DataWindow($data_element, $offset, 4));
        $offset += 4;

        // The next 4 bytes define the count of filters.
        $index_components = $data_element->getLong($offset);
        $this->debug("{filters} filters", [
            'filters' => $index_components,
        ]);
        $offset += 4;

        // Loop and parse through the filters.
        for ($i = 0; $i < $index_components; $i++) {
            $filter_size = $data_element->getLong($offset + 4);
            $this
                ->addItemWithDefinition(new ItemDefinition(Collection::get('MakerNotes\Canon\Filter'), ItemFormat::BYTE, $filter_size, $offset, 0, $i))
                ->parseData(new DataWindow($data_element, $offset, $filter_size + 4));
            $offset += 4 + $filter_size;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
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
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
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
}
