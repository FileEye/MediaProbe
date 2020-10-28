<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Apple;

use FileEye\MediaProbe\Block\Exif\Ifd;
use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\RawData;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\ConvertBytes;

class MakerNote extends Ifd
{
    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element, $xxx = 0): void
    {
        $size = $data_element->getSize();
        $offset = $this->getDefinition()->getDataOffset();

        // Load Apple's header as a raw data block.
        $header_data_definition = new ItemDefinition(Collection::get('RawData', ['name' => 'appleHeader']), ItemFormat::BYTE, 14);
        $header_data_window = new DataWindow($data_element, $offset, 14);
        $header = new RawData($header_data_definition, $this);
        $header->parseData($header_data_window);

        $offset += 14;

        // Get the number of entries.
        $n = $this->getItemsCountFromData($data_element, $offset);
        $this->debugBlockInfo($data_element, $n);

        // Load the Blocks.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            try {
                $item_definition = $this->getItemDefinitionFromData($i, $data_element, $i_offset);
                $item_class = $item_definition->getCollection()->getPropertyValue('class');
                $item = new $item_class($item_definition, $this);
                if (is_a($item_class, Ifd::class, true)) {
                    $item->parseData($data_element);
                } else {
                    $item_data_window = new DataWindow($data_element, $item_definition->getDataOffset(), $item_definition->getSize());
                    $item->parseData($item_data_window);
                }
            } catch (DataException $e) {
                $item->error($e->getMessage());
                $valid = false;
            }
        }

        $this->valid = true;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $bytes = $this->getElement('rawData')->toBytes();

        // Number of sub-elements. 2 bytes running.
        $n = count($this->getMultipleElements('*')) - 1;
        $bytes .= ConvertBytes::fromShort($n, $byte_order);

        // Data area. We need to reserve 12 bytes for each IFD tag + 4 bytes
        // at the end for the link to next IFD as space occupied by IFD
        // entries.
        $data_area_offset = strlen($bytes) + $n * 12 + 4;
        $data_area_bytes = '';

        // Fill in the TAG entries in the IFD.
        foreach ($this->getMultipleElements('*') as $tag => $sub_block) {
            if ($sub_block->getCollection()->getId() === 'RawData') {
                continue;
            }

            $bytes .= ConvertBytes::fromShort($sub_block->getAttribute('id'), $byte_order);
            $bytes .= ConvertBytes::fromShort($sub_block->getFormat(), $byte_order);
            $bytes .= ConvertBytes::fromLong($sub_block->getComponents(), $byte_order);

            $data = $sub_block->toBytes($byte_order, $data_area_offset);
            $s = strlen($data);
            if ($s > 4) {
                $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
                $data_area_bytes .= $data;
                $data_area_offset += $s;
            } else {
                // Copy data directly, pad with NULL bytes as necessary to
                // fill out the four bytes available.
                $bytes .= $data . str_repeat(chr(0), 4 - $s);
            }
        }

        // There is no next IFD.
        $bytes .= ConvertBytes::fromLong(0, $byte_order);

        // Append data area.
        $bytes .= $data_area_bytes;

        return $bytes;
    }
}
