<?php

namespace ExifEye\Apple\Block;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\DataElement;
use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use CFPropertyList\CFPropertyList;
use ExifEye\core\Spec;

class RunTime extends Ifd
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        $this->debug("START... Loading");

        $plist = new CFPropertyList();
        $plist->parse($data_element->getBytes($options['data_offset'], $options['components']));
        
        // Build a TAG object for each PList item.
        foreach ($plist->toArray() as $tag_name => $value) {
            $tag_id = Spec::getTagIdByName($this, $tag_name);
            $tag_format = Spec::getTagFormat($this, $tag_id)[0];
            $tag_entry_class = Spec::getEntryClass($this, $tag_id, $tag_format);
            $tag = new Tag($this, $tag_id, $tag_entry_class, [$value], $tag_format, 1);
        }

        $this->debug(".....END Loading");
    }
}
