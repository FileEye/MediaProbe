<?php

namespace FileEye\ImageInfo\Apple\Block;

use FileEye\ImageInfo\core\Block\IfdBase;
use FileEye\ImageInfo\core\Block\IfdItem;
use FileEye\ImageInfo\core\Block\Tag;
use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\ImageInfo;
use CFPropertyList\CFDictionary;
use CFPropertyList\CFNumber;
use CFPropertyList\CFPropertyList;
use FileEye\ImageInfo\core\Collection;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

class RunTime extends IfdBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null)
    {
        if ($size === null) {
            $size = $data_element->getSize();
        }

        $this->debug("IFD {ifdname}", [
            'ifdname' => $this->getAttribute('name'),
        ]);

        $plist = new CFPropertyList();
        $plist->parse($data_element->getBytes($offset, $this->ifdItem->getComponents()));

        // Build a TAG object for each PList item.
        foreach ($plist->toArray() as $tag_name => $value) {
            $ifd_item = new IfdItem($this->getCollection()->getItemCollection($tag_name));
            $item_format = $ifd_item->getFormat();
            $entry_class = $ifd_item->getEntryClass();
            $tag = new Tag($ifd_item, $this);
            $entry_class = $ifd_item->getEntryClass();
            new $entry_class($tag, [$value]);
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
