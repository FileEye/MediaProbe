<?php

namespace FileEye\ImageInfo\core\Block;

use FileEye\ImageInfo\core\Block\Tag;
use FileEye\ImageInfo\core\Collection;
use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\Data\DataException;
use FileEye\ImageInfo\core\ElementInterface;
use FileEye\ImageInfo\core\Entry\Core\EntryInterface;
use FileEye\ImageInfo\core\ImageInfo;
use FileEye\ImageInfo\core\ImageInfoException;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

/**
 * Abstract class representing an Image File Directory (IFD).
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all IFD
 * Block objects.
 */
abstract class IfdBase extends BlockBase
{
    // xx
    protected $ifdItem;

    /**
     * Constructs a Block for an Image File Directory (IFD).
     */
    public function __construct(IfdItem $ifd_item, BlockBase $parent = null, BlockBase $reference = null)
    {
        parent::__construct($ifd_item->getCollection(), $parent, $reference);

        if ($ifd_item->getId() !== null) {
            $this->setAttribute('id', $ifd_item->getId());
        }
        $this->setAttribute('name', $ifd_item->getCollection()->getPropertyValue('name'));
        $this->ifdItem = $ifd_item;
    }

    /**
     * Gets the number of items in the IFD.
     *
     * Items can be TAGs, other IFDs, etc.
     *
     * @param DataElement $data_element
     *            the data element that will provide the data.
     * @param int $offset
     *            the offset within the data element where the count can be
     *            found.
     *
     * @return int
     *            the number of items in the IFD.
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
     * Gets an IfdItem object from the data.
     *
     * @param int $i
     *            the sequence of the item in the IFD.
     * @param DataElement $data_element
     *            the data element that will provide the data.
     * @param int $offset
     *            the offset within the data element where the count can be
     *            found.
     * @param \FileEye\ImageInfo\core\ElementInterface $parent_element
     *            The parent element of this IFD.
     * @param int $data_offset_shift
     *            (Optional) if specified, an additional shift to the offset
     *            where data can be found.
     *
     * @return \FileEye\ImageInfo\core\Block\IfdItem
     *            the IfdItem object of the IFD item.
     */
    protected function getIfdItemFromData($i, DataElement $data_element, $offset, ElementInterface $parent_element, $data_offset_shift = 0)
    {
        $id = $data_element->getShort($offset);
        $format = $data_element->getShort($offset + 2);
        $components = $data_element->getLong($offset + 4);

        // If the data size is bigger than 4 bytes, then actual data is not in
        // the TAG's data element, but at the the offset stored in the data
        // element.
        if (($size = IfdFormat::getSize($format) * $components) > 4) {
            $data_offset = $data_element->getLong($offset + 8) + $data_offset_shift;
        } else {
            $data_offset = $offset + 8;
        }

        $this->debug("#{i} @{ifdoffset}, id {id}, f {format}, c {components}, data @{offset}, size {size}", [
            'i' => $i + 1,
            'ifdoffset' => $data_element->getStart() + $offset,
            'id' => '0x' . strtoupper(dechex($id)),
            'format' => IfdFormat::getName($format),
            'components' => $components,
            'offset' => $data_element->getStart() + $data_offset,
            'size' => $size,
        ]);

        $item_collection = $parent_element->getCollection()->getItemCollection($id, '__NIL__', [
            'item' => $id,
            'DOMNode' => 'tag',
        ]);
        return new IfdItem($item_collection, $format, $components, $data_offset);
    }

    /**
     * Invoke post-load callbacks.
     *
     * @param \FileEye\ImageInfo\core\Data\DataElement $data_element
     *   @todo
     */
    protected function executePostLoadCallbacks(DataElement $data_element)
    {
        $post_load_callbacks = $this->getCollection()->getPropertyValue('postLoad');
        if (!empty($post_load_callbacks)) {
            foreach ($post_load_callbacks as $callback) {
                call_user_func($callback, $data_element, $this);
            }
        }
        return $this;
    }

    // xx
    public function getFormat()
    {
        return $this->ifdItem->getFormat();
    }

    // xx
    public function getComponents()
    {
        return count($this->getMultipleElements('ifd|tag')); // xx make general
    }
}
