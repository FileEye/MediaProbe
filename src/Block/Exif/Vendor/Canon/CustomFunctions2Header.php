<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Manages parsing and writing of Canon CustomFunctions2 tags.
 */
class CustomFunctions2Header extends ListBase
{
    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        $offset = 0;
        $size = $this->getDefinition()->getSize();

        // Validate incoming size.
        if ($size !== $data->getLong($offset)) {
            throw new DataException("index:%s mismatching data size", $this->getAttribute('name')); // @todo ingest in logging
        } elseif ($size < 8) {
            throw new DataException("index:%s invalid data size", $this->getAttribute('name')); // @todo ingest in logging
        }

        // Get groups count.
        $groups_count = $data->getLong($offset + 4);
        $this->debug("index:{name} @{offset} with {tags} groups, size {size}", [
            'name' => $this->getAttribute('name'),
            'tags' => $groups_count,
            'offset' => $data->getStart() + $offset,
            'size' => $size,
        ]);

        // Parse groups.
        $pos = $offset + 8;
        for ($i = 0; $i < $groups_count; $i++) {
            $rec_num = $data->getLong($pos);
            $rec_len = $data->getLong($pos + 4);
            $rec_count = $data->getLong($pos + 8);
            $this->debug("index:{name} group {num} with {tags} tags, size {size} @{offset}", [
                'name' => $this->getAttribute('name'),
                'num' => $rec_num,
                'tags' => $rec_count,
                'size' => $rec_len,
                'offset' => $data->getStart() + $pos,
            ]);

            $pos += 12;
            try {
                $item_definition = new ItemDefinition($this->getCollection()->getItemCollection($rec_num), DataFormat::SIGNED_LONG, $rec_count);
                $class = $item_definition->getCollection()->getPropertyValue('class');
                $group = new $class($item_definition, $this);
                $group->parseData($data, $pos, min($rec_len, $data->getSize() - $pos));
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                throw new MediaProbeException($e->getMessage()); // @todo ingest in logging
            }
            $pos += ($rec_len - 8);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
    {
        $bytes = '';

        // Fill in the Functions2 groups.
        foreach ($this->getMultipleElements('*') as $group) {
            // The group's data.
            $group_data = $group->toBytes($byte_order);
            // The group's ID.
            $group_bytes = ConvertBytes::fromLong($group->getAttribute('id'), $byte_order);
            // The group's data size.
            $group_bytes .= ConvertBytes::fromLong(strlen($group_data) + 8, $byte_order);
            // The group's items count.
            $group_bytes .= ConvertBytes::fromLong($group->getComponents(), $byte_order);
            // Append the group's data.
            $group_bytes .= $group_data;

            // Append the group's bytes.
            $bytes .= $group_bytes;
        }

        // Add number of groups.
        $bytes = ConvertBytes::fromLong(count($this->getMultipleElements('*')), $byte_order) . $bytes;

        // Add total size and return.
        return ConvertBytes::fromLong(strlen($bytes) + 4, $byte_order) . $bytes;
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents(): int
    {
        // The components in this case is the total number of Long values
        // stored in the index. At the start, we have 1 long representing the
        // total size in bytes, and 1 long representing the number of groups,
        // so we start the count off 2.
        $components = 2;
        foreach ($this->getMultipleElements('*') as $group) {
            // For each group, 1 long for the ID, 1 long to represent the
            // size of the group, 1 long to represent the number of tags.
            $components += (1 + 1 + 1);
            foreach ($group->getMultipleElements('tag') as $tag) {
                // For each tag, 1 long for the ID, 1 long to represent the
                // number of tag values, then as many longs as the number of
                // values.
                $components += (1 + 1 + $tag->getComponents());
            }
        }
        return $components;
    }
}
