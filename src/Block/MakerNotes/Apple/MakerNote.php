<?php

namespace FileEye\MediaProbe\Block\MakerNotes\Apple;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\RawData;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Block\Ifd;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

class MakerNote extends Ifd
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, int $offset = 0, $size = null): void
    {
        if ($size === null) {
            $size = $data_element->getSize();
        }

        // Load Apple's header as a raw data block.
        $header = new RawData(Collection::get('RawData'), $this);
        $header_data_window = new DataWindow($data_element, $offset, 14);
        $header_data_window->logInfo($header->getLogger());
        $header->loadFromData($header_data_window, 0, $header_data_window->getSize());

        $offset += 14;

        // Get the number of entries.
        $n = $this->getItemsCountFromData($data_element, $offset);

        // Load the Blocks.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            $item_definition = $this->getItemDefinitionFromData($i, $data_element, $i_offset, $offset - 14);

            $class = $item_definition->getCollection()->getPropertyValue('class');
            $ifd_entry = new $class($item_definition, $this);

            try {
                $ifd_entry->loadFromData($data_element, $item_definition->getDataOffset(), $size);
            } catch (DataException $e) {
                $this->error($e->getMessage());
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
