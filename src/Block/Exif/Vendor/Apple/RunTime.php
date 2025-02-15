<?php

namespace FileEye\MediaProbe\Block\Exif\Vendor\Apple;

use CFPropertyList\CFDictionary;
use CFPropertyList\CFNumber;
use CFPropertyList\CFPropertyList;
use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Media\Tiff\IfdEntryValueObject;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Utility\ConvertBytes;

class RunTime extends ListBase
{
    protected function doParseData(DataElement $data): void
    {
        assert($this->debugInfo(['dataElement' => $data]));

        $plist = new CFPropertyList();
        $plist->parse($data->getBytes(0, $this->getDefinition()->valuesCount));

        // Build a TAG object for each PList item.
        foreach ($plist->toArray() as $tag_name => $value) {
            $item_collection = $this->getCollection()->getItemCollection($tag_name);
            $item_format = $item_collection->getPropertyValue('format')[0];
            $item_definition = new IfdEntryValueObject($item_collection, $item_format);
            $tag = new Tag($item_definition, $this);
            $entry_class = $tag->getEntryClass();
            new $entry_class($tag, new DataString((string) $value));
            $this->graftBlock($tag);
        }
    }

    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
    {
        $plist = new CFPropertyList();

        // The Root element of the PList is a Dictionary.
        $dict = new CFDictionary();
        $plist->add($dict);

        // Fill in the TAG entries in the IFD.
        foreach ($this->getMultipleElements('*') as $tag => $sub_block) {
            assert($sub_block instanceof Tag);
            $dict->add($sub_block->getCollection()->getPropertyValue('item'), new CFNumber($sub_block->getValue()));
        }

        return $plist->toBinary();
    }

    public function getComponents(): int
    {
        return strlen($this->toBytes());
    }
}
