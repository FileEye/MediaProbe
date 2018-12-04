<?php

namespace ExifEye\Apple\Block;

use ExifEye\core\Block\IfdBase;
use ExifEye\core\Block\IfdItem;
use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ExifEye;
use CFPropertyList\CFDictionary;
use CFPropertyList\CFNumber;
use CFPropertyList\CFPropertyList;
use ExifEye\core\Collection;
use ExifEye\core\Utility\ConvertBytes;

class RunTime extends IfdBase
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'plist';

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        $this->debug("IFD {ifdname}", [
            'ifdname' => $this->getAttribute('name'),
        ]);

        $plist = new CFPropertyList();
        $plist->parse($data_element->getBytes($options['data_offset'], $options['components']));

        // Build a TAG object for each PList item.
        foreach ($plist->toArray() as $tag_name => $value) {
            $ifd_item = new IfdItem($this->getCollection(), $tag_name);
            $item_format = $ifd_item->getFormat();
            $entry_class = $ifd_item->getEntryClass();
            $tag_collection = $ifd_item->getCollection();
            $tag = new Tag($tag_collection, $ifd_item, $this);
            $entry_class = $ifd_item->getEntryClass();
            new $entry_class($tag, [$value]);
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
        $plist = new CFPropertyList();

        // The Root element of the PList is a Dictionary.
        $dict = new CFDictionary();
        $plist->add($dict);

        // Fill in the TAG entries in the IFD.
        foreach ($this->getMultipleElements('*') as $tag => $sub_block) {
            $dict->add($sub_block->getAttribute('name'), new CFNumber($sub_block->getValue()));
        }

        return $plist->toBinary();
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        return strlen($this->toBytes());
    }
}
