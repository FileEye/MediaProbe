<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\Collection;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Abstract class representing an Image File Directory (IFD).
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all IFD
 * Block objects.
 */
abstract class IfdBase extends BlockBase
{
    /**
     * xx remove
     *
     * @var int
     */
    protected $format;

    // xx
    protected $ifdItem;

    /**
     * Constructs a Block for an Image File Directory (IFD).
     */
    public function __construct(Collection $collection, IfdItem $ifd_item, BlockBase $parent = null, BlockBase $reference = null)
    {
        parent::__construct($collection, $parent, $reference);

        if ($ifd_item->getId() !== null) {
            $this->setAttribute('id', $ifd_item->getId());
        }
        $this->format = $ifd_item->getFormat();
        $this->setAttribute('name', $ifd_item->getName());
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
     * @param \ExifEye\core\Collection $parent_collection
     *            the collection of the parent of this IFD.
     * @param int $data_offset_shift
     *            (Optional) if specified, an additional shift to the offset
     *            where data can be found.
     *
     * @return \ExifEye\core\Block\IfdItem
     *            the IfdItem object of the IFD item.
     */
    protected function getIfdItemFromData($i, DataElement $data_element, $offset, Collection $parent_collection, $data_offset_shift = 0)
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

        return new IfdItem($parent_collection, $id, $format, $components, $data_offset);
    }

    /**
     * Invoke post-load callbacks.
     *
     * @param \ExifEye\core\Data\DataElement $data_element
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
