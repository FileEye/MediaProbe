<?php

namespace FileEye\MediaProbe\Block\MakerNotes\Canon;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * @todo xxx
 */
class CustomFunctions2Header extends ListBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        $valid = true;

        // @todo xx validate incoming size

        // Get the size of the index.
        // @todo xx manage if not enough data
        $size = $data_element->getShort($offset);

        // Check if we have enough data.
        if ($size === 0) {
            $this->error("index:{ifdname} - no data", [
                'ifdname' => $this->getAttribute('name'),
            ]);
            return 0;
        }
        elseif ($size < 8) {
            $this->error("index:{ifdname} - not enough data to parse", [
                'ifdname' => $this->getAttribute('name'),
            ]);
            return 0;
        }

        // Get groups count.
        $groups_count = $data_element->getLong($offset + 4);
        $this->debug("index:{ifdname} @{offset} with {tags} groups, size {size}", [
            'ifdname' => $this->getAttribute('name'),
            'tags' => $groups_count,
            'offset' => $data_element->getStart() + $offset,
            'size' => $size,
        ]);

        // Parse groups.
        $pos = $offset + 8;
        for ($i = 0; $i < $groups_count; $i++) {
            $rec_num = $data_element->getLong($pos);
            $rec_len = $data_element->getLong($pos + 4);
            $rec_count = $data_element->getLong($pos + 8);
            $this->debug("index:{ifdname} group {num} with {tags} tags, size {size} @{offset}", [
                'ifdname' => $this->getAttribute('name'),
                'num' => $rec_num,
                'tags' => $rec_count,
                'size' => $rec_len,
                'offset' => $data_element->getStart() + $pos,
            ]);

            $pos += 12;
            try {
                $item_definition = new ItemDefinition($this->getCollection()->getItemCollection($rec_num), ItemFormat::SIGNED_LONG, $rec_count);
                $class = $item_definition->getCollection()->getPropertyValue('class');
                $group = new $class($item_definition, $this);
                $group->loadFromData($data_element, $pos, $rec_len);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                $this->valid = false;
                return $this;
            }
            $pos += ($rec_len - 8);
        }

        $this->valid = $valid;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $bytes = '';

        // Fill in the Functions2 groups.
        foreach ($this->getMultipleElements('*') as $group) {
            // The group's data.
            $tmp = $group->toBytes($byte_order);
            // The group's ID.
            $bytes .= ConvertBytes::fromLong($group->getAttribute('id'), $byte_order);
            // The group's data size.
            $bytes .= ConvertBytes::fromLong(strlen($tmp) + 8, $byte_order);
            // The group's items count.
            $bytes .= ConvertBytes::fromLong($group->getComponents(), $byte_order);
            // The data.
            $bytes .= $tmp;
        }

        // Add number of groups.
        $bytes = ConvertBytes::fromLong($this->getComponents(), $byte_order) . $bytes;

        // Add total size and return.
        return ConvertBytes::fromLong(strlen($bytes) + 4, $byte_order) . $bytes;
    }
}
