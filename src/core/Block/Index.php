<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Collection;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing an index of values.
 */
class Index extends IfdBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        if ($size === null) {
            $size = $data_element->getSize();
        }

        $this->debug("Index {ifdname} @{offset} with {tags} entries", [
            'ifdname' => $this->getAttribute('name'),
            'tags' => $this->ifdItem->getComponents(),
            'offset' => $data_element->getStart() + $offset,
        ]);

        $index_size = $data_element->getShort($offset);
        if ($index_size / $this->ifdItem->getComponents() !== IfdFormat::getSize(IfdFormat::getFromName('Short'))) {
            $this->warning('Size of {ifd_name} does not match the number of entries.', [
                'ifd_name' => $this->getAttribute('name'),
            ]);
        }
        $offset += 2;
        for ($i = 0; $i < $this->ifdItem->getComponents(); $i++) {
            $item_collection = $this->getCollection()->getItemCollection($i + 1, '__NIL__', [
                'item' => $i + 1,
                'DOMNode' => 'tag',
            ]);
            $item_format = $item_collection->getPropertyValue('format') ? $item_collection->getPropertyValue('format')[0] : IfdFormat::getFromName('SignedShort');
            $ifd_item = new IfdItem($item_collection, $item_format);

            // Check if this tag ($i + 1) should be skipped.
            if ($ifd_item->getCollection()->getPropertyValue('skip')) {
                continue;
            };

            switch (IfdFormat::getName($item_format)) {
                case 'Short':
                    $item_value = $data_element->getShort($offset + $i * 2);
                    break;
                case 'Long':
                    $item_value = $data_element->getLong($offset + $i * 2);
                    break;
                case 'SignedShort':
                    $item_value = $data_element->getSignedShort($offset + $i * 2);
                    break;
            }

            $this->debug("#{i} id {id}, f {format}, data @{offset}", [
                'i' => $i + 1,
                'id' => '0x' . strtoupper(dechex($i)),
                'format' => IfdFormat::getName($item_format),
                'offset' => $data_element->getStart() + $offset + $i * 2,
            ]);

            $tag = new Tag($ifd_item, $this);
            $entry_class = $ifd_item->getEntryClass();
            new $entry_class($tag, [$item_value]);
            $tag->valid = true;
        }

        $this->valid = true;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $data_bytes = '';

        foreach ($this->getMultipleElements('tag') as $tag => $sub_block) {
            $data_bytes .= $sub_block->toBytes($byte_order);
        }

        return ConvertBytes::fromShort(strlen($data_bytes), $byte_order) . $data_bytes;
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        $size = 0;
        foreach ($this->getMultipleElements('tag') as $tag) {
            $size += IfdFormat::getSize($tag->getFormat());
        }
        return $size / 2;
    }
}
