<?php

namespace ExifEye\Apple\Block;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use CFPropertyList\CFDictionary;
use CFPropertyList\CFNumber;
use CFPropertyList\CFPropertyList;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

class RunTime extends Ifd
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        if (isset($options['format'])) {
            $this->format = $options['format'];
        }
        if (isset($options['components'])) {
            $this->components = $options['components'];
        }

        $this->debug("START... Loading");
        // xax
/*        $this->debug(">> o {ifdoffset}, c {components}, f {format}, s {size}, d {data}", [
            'ifdoffset' => $offset,
            'components' => $this->components,
            'format' => Format::getName($this->format),
            'size' => $size,
            'data' => $options['data_offset'],
        ]);*/
        //$this->debug(ExifEye::dumpHex($data_element->getBytes($tag_data_offset), 20));


        $plist = new CFPropertyList();
        $plist->parse($data_element->getBytes($options['data_offset'], $options['components']));

        // Build a TAG object for each PList item.
        foreach ($plist->toArray() as $tag_name => $value) {
            $tag_id = Spec::getElementIdByName($this->getType(), $tag_name);
            $item_format = Spec::getElementPropertyValue($this->getType(), $tag_id, 'format')[0];
            $tag_entry_class = Spec::getElementHandlingClass($this->getType(), $tag_id, $item_format);
            $tag = new Tag('tag', $this, $tag_id, $tag_entry_class, [$value], $item_format, 1);
        }

        $this->debug(".....END Loading");
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
