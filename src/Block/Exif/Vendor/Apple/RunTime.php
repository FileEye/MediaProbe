<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Apple;

use CFPropertyList\CFDictionary;
use CFPropertyList\CFNumber;
use CFPropertyList\CFPropertyList;
use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

class RunTime extends ListBase
{
    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        $plist = new CFPropertyList();
        $plist->parse($data->getBytes(0, $this->getDefinition()->getValuesCount()));

        // Build a TAG object for each PList item.
        foreach ($plist->toArray() as $tag_name => $value) {
            $item_collection = $this->getCollection()->getItemCollection($tag_name);
            $item_format = $item_collection->getPropertyValue('format')[0];
            $item_definition = new ItemDefinition($item_collection, $item_format);
            $tag = new Tag($item_definition, $this);
            $entry_class = $item_definition->getEntryClass();
            new $entry_class($tag, [$value]);
            $tag->parsed = true;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false): string
    {
        $plist = new CFPropertyList();

        // The Root element of the PList is a Dictionary.
        $dict = new CFDictionary();
        $plist->add($dict);

        // Fill in the TAG entries in the IFD.
        foreach ($this->getMultipleElements('*') as $tag => $sub_block) {
            $dict->add($sub_block->getCollection()->getPropertyValue('item'), new CFNumber($sub_block->getValue()));
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
