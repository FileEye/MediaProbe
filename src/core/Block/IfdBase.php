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
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Collection;

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
    public function __construct(BlockBase $parent_block, IfdItem $ifd_item, ElementInterface $reference = null)
    {
        parent::__construct($ifd_item->getType(), $parent_block, $reference);

        if ($ifd_item->getId() !== null) {
            $this->setAttribute('id', $ifd_item->getId());
        }
        $this->format = $ifd_item->getFormat();
        $this->setAttribute('name', $ifd_item->getName());
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        throw new ExifEyeException(get_called_class() . 'is not implementing ' . __FUNCTION__);
    }

    /**
     *   @todo
     */
    protected function getIfdItemsCountFromData(DataElement $data_element, $offset)
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
    protected function getIfdItemFromData($i, DataElement $data_element, $offset, $parent_type, $data_offset_shift = 0)
    {
        $id = $data_element->getShort($offset);
        $format = $data_element->getShort($offset + 2);
        $components = $data_element->getLong($offset + 4);

        // If the data size is bigger than 4 bytes, then actual data is not in
        // the TAG's data element, but at the the offset stored in the data
        // element.
        if (($size = Collection::getFormatSize($format) * $components) > 4) {
            $data_offset = $data_element->getLong($offset + 8) + $data_offset_shift;
        } else {
            $data_offset = $offset + 8;
        }

        $this->debug("#{i} @{ifdoffset}, id {id}, f {format}, c {components}, data @{offset}, size {size}", [
            'i' => $i + 1,
            'ifdoffset' => $data_element->getStart() + $offset,
            'id' => '0x' . strtoupper(dechex($id)),
            'format' => Collection::getFormatName($format),
            'components' => $components,
            'offset' => $data_element->getStart() + $data_offset,
            'size' => $size,
        ]);

        return new IfdItem($parent_type, $id, $format, $components, $data_offset);
    }

    /**
     * Invoke post-load callbacks.
     *
     * @param \ExifEye\core\Data\DataElement $data_element
     *   @todo
     */
    protected function executePostLoadCallbacks(DataElement $data_element)
    {
        $post_load_callbacks = Collection::getPropertyValue($this->getType(), 'postLoad');
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
