<?php

namespace ExifEye\Apple\Block;

use ExifEye\core\Block\IfdBase;
use ExifEye\core\Block\RawData;
use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Spec;

class MakerNote extends IfdBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        // Load Apple's header as a raw data block.
        $header = new RawData('rawData', $this);
        $header_data_window = new DataWindow($data_element, $offset, 14);
        $header_data_window->debug($header);
        $header->loadFromData($header_data_window, 0, $header_data_window->getSize());

        $starting_offset = $offset;
        $offset += 14;

        // Get the number of entries.
        $n = $this->getEntriesCountFromData($data_element, $offset);

        // Load the Blocks.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            $entry = $this->getEntryFromData($i, $data_element, $i_offset, $this->getType(), $offset - 14);

            if ($entry['type'] === 'tag' || $entry['type'] === null) {
                $tag_entry_arguments = call_user_func($entry['class'] . '::getInstanceArgumentsFromTagData', $this, $entry['format'], $entry['components'], $data_element, $entry['data_offset']);
                $tag = new Tag('tag', $this, $entry['id'], $entry['class'], $tag_entry_arguments, $entry['format'], $entry['components']);
            } else {
                $ifd = new $entry['class']($entry['type'], $entry['name'], $this, $entry['id'], $entry['format']);
                try {
                    $ifd->loadFromData($data_element, $data_element->getLong($i_offset + 8), $size, $entry);
                } catch (DataException $e) {
                    $this->error($e->getMessage());
                }
            }
        }

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);

        return $this;
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
            if ($sub_block->getType() === 'rawData') {
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

        // Append link to next IFD.
        if ($has_next_ifd) {
            $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
        } else {
            $bytes .= ConvertBytes::fromLong(0, $byte_order);
        }

        // Append data area.
        $bytes .= $data_area_bytes;

        return $bytes;
    }
}
