<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Spec;

/**
 * Abstract class representing an Image File Directory (IFD).
 */
class IfdBase extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'ifd';

    /**
     * The format of the tag representing this IFD.
     *
     * @var int
     */
    protected $format;

    /**
     * Constructs a Block for an Image File Directory (IFD).
     */
    public function __construct($type, $name, BlockBase $parent_block, $tag_id = null, $tag_format = null, ElementInterface $reference = null)
    {
        parent::__construct($type, $parent_block, $reference);

        if ($tag_id !== null) {
            $this->setAttribute('id', $tag_id);
        }
        $this->format = isset($tag_format) ? $tag_format : Format::getIdFromName('Long');
        $this->setAttribute('name', $name);
        $this->hasSpecification = Spec::getElementIdByName($parent_block->getType(), $name) ? true : false;
    }

    /**
     *   @todo
     */
    protected function getEntriesCountFromData(DataElement $data_element, $offset)
    {
        // Get the number of tags.
        $entries_count = $data_element->getShort($offset);
        $this->debug("IFD {ifdname} @{offset} with {tags} entries", [
            'ifdname' => $this->getAttribute('name'),
            'tags' => $entries_count,
            'offset' => $data_element->getStart() + $offset,
        ]);

        // Check if we have enough data.
        if (2 + 12 * $entries_count > $data_element->getSize()) {
            $entries_count = floor(($offset - $data_element->getSize()) / 12);
            $this->warning('Wrong number of IFD entries in ifd {ifdname}, adjusted to {tags}', [
                'tags' => $entries_count,
            ]);
        }

        return $entries_count;
    }

    /**
     *   @todo
     */
    protected function getEntryFromData($i, DataElement $data_element, $offset, $data_offset_shift = 0)
    {
        $entry = [];

        $entry['id'] = $data_element->getShort($offset);
        $entry['format'] = $data_element->getShort($offset + 2);
        $entry['components'] = $data_element->getLong($offset + 4);

        // If the data size is bigger than 4 bytes, then actual data is not in
        // the TAG's data element, but at the the offset stored in the data
        // element.
        $entry['size'] = Format::getSize($entry['format']) * $entry['components'];
        if ($entry['size'] > 4) {
            $entry['data_offset'] = $data_element->getLong($offset + 8) + $data_offset_shift;
        } else {
            $entry['data_offset'] = $offset + 8;
        }

        $this->debug("#{i} @{ifdoffset}, id {id}, f {format}, c {components}, data @{offset}, size {size}", [
            'i' => $i + 1,
            'ifdoffset' => $data_element->getStart() + $offset,
            'id' => '0x' . strtoupper(dechex($entry['id'])),
            'format' => Format::getName($entry['format']),
            'components' => $entry['components'],
            'offset' => $data_element->getStart() + $entry['data_offset'],
            'size' => $entry['size'],
        ]);

        return $entry;
    }

    /**
     * Invoke post-load callbacks.
     *
     * @param \ExifEye\core\Data\DataElement $data_element
     *   @todo
     */
    protected function executePostLoadCallbacks(DataElement $data_element)
    {
        $post_load_callbacks = Spec::getTypePropertyValue($this->getType(), 'postLoad');
        if (!empty($post_load_callbacks)) {
            foreach ($post_load_callbacks as $callback) {
                call_user_func($callback, $data_element, $this);
            }
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        throw new ExifEyeException(get_class() . 'is not implementing ' . __FUNCTION__);
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        return count($this->getMultipleElements('ifd|tag'));
    }
}
