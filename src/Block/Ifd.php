<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing an Image File Directory (IFD).
 */
class Ifd extends ListBase
{
    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element, $xxx = 0): void
    {
        $valid = true;

        $offset = $this->getDefinition()->getDataOffset();

        // Get the number of entries.
        $n = $this->getItemsCountFromData($data_element, $offset);
        $this->debugBlockInfo($data_element, $n);
if ($this->getAttribute('name') === 'CanonFilterInfo') dump(MediaProbe::dumpHexFormatted($n, $data_element));

        // Parse the items.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            try {
                $item_definition = $this->getItemDefinitionFromData($i, $data_element, $i_offset, $xxx, 'Ifd\\Any');
                $item_class = $item_definition->getCollection()->getPropertyValue('class');
                $item = new $item_class($item_definition, $this);
                if (is_a($item_class, Ifd::class, true)) {
                    $item->parseData($data_element);
                } else {
                    // In case of an IFD terminator item entry, i.e. zero
                    // components, the data window size is still 4 bytes, from
                    // the IFD index area.
                    $item_data_window_size = $item_definition->getValuesCount() > 0 ? $item_definition->getSize() : 4;
                    $item_data_window = new DataWindow($data_element, $item_definition->getDataOffset(), $item_data_window_size);
                    $item->parseData($item_data_window);
                }
            } catch (DataException $e) {
                $item->error($e->getMessage());
                $valid = false;
            }
        }

        $this->valid = $valid;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);
    }

    /**
     * Gets the number of items in the IFD, from the data.
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
    protected function getItemsCountFromData(DataElement $data_element, $offset): int
    {
        // Get the number of tags.
        $entries_count = $data_element->getShort($offset);

        // Check if we have enough data.
        if (2 + 12 * $entries_count > $data_element->getSize()) {
            $entries_count = floor(($offset - $data_element->getSize()) / 12);
            $this->warning('Wrong number of IFD entries in ifd {ifdname}, adjusted to {tags}', [
                'ifdname' => $this->getAttribute('name'),
                'tags' => $entries_count,
            ]);
        }

        return $entries_count;
    }

    /**
     * Gets the ItemDefinition object of an IFD item, from the data.
     *
     * @param int $seq
     *            The sequence (0-index) of the item in the IFD.
     * @param DataElement $data_element
     *            the data element that will provide the data.
     * @param int $offset
     *            the offset within the data element where the count can be
     *            found.
     * @param int $data_offset_shift
     *            (Optional) if specified, an additional shift to the offset
     *            where data can be found.
     * @todo xxx
     *
     * @return \FileEye\MediaProbe\ItemDefinition
     *            the ItemDefinition object of the IFD item.
     */
    protected function getItemDefinitionFromData(int $seq, DataElement $data_element, int $offset, int $data_offset_shift = 0, string $fallback_collection_id = null): ItemDefinition
    {
        $id = $data_element->getShort($offset);
        $format = $data_element->getShort($offset + 2);
        $components = $data_element->getLong($offset + 4);
        $size = ItemFormat::getSize($format) * $components;

        // If the data size is bigger than 4 bytes, then actual data is not in
        // the TAG's data element, but at the the offset stored in the data
        // element.
        if ($size > 4) {
            $data_offset = $data_element->getLong($offset + 8) + $data_offset_shift;
        } else {
            $data_offset = $offset + 8;
        }

        // Fall back to the generic IFD collection if the item is missing from
        // the appropriate one.
        try {
            $item_collection = $this->getCollection()->getItemCollection($id);
        } catch (MediaProbeException $e) {
            if ($fallback_collection_id !== null) {
                $item_collection = Collection::get($fallback_collection_id)->getItemCollection($id, 'UnknownTag', [
                    'item' => $id,
                    'DOMNode' => 'tag',
                ]);
            } else {
                $item_collection = $this->getCollection()->getItemCollection($id, 'UnknownTag', [
                    'item' => $id,
                    'DOMNode' => 'tag',
                ]);
            }
        }

        // If the item is an Ifd, recurse in loading the item at offset.
        if (is_a($item_collection->getPropertyValue('class'), Ifd::class, true)) {
            // Check the offset.
            $item_offset = $data_element->getLong($offset + 8);
/*          if ($item_offset <= $offset) {
            $this->error('Invalid offset pointer to IFD: {offset}.', [
                'offset' => $item_definition->getDataOffset(),
            ]);
            $valid = false;
            continue;
          }*/
            $components = $data_element->getShort($item_offset - 8);
            $format = ItemFormat::LONG;
            $data_offset = $item_offset;
        }

        return new ItemDefinition($item_collection, $format, $components, $data_offset, $data_element->getStart() + $offset, $seq);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $bytes = '';

        // Number of sub-elements. 2 bytes running.
        $n = count($this->getMultipleElements('*'));
        if ($thumbnail = $this->getElement('thumbnail')) {
            $n += 1;
        }

        $bytes .= ConvertBytes::fromShort($n, $byte_order);

        // Data area. We need to reserve 12 bytes for each IFD tag + 4 bytes
        // at the end for the link to next IFD as space occupied by IFD
        // entries.
        $data_area_offset = $offset + strlen($bytes) + $n * 12 + 4;
        $data_area_bytes = '';

        // Fill in the TAG entries in the IFD.
        foreach ($this->getMultipleElements('*') as $tag => $sub_block) {
            if ($sub_block->getCollection()->getId() === 'Thumbnail') {
                continue;
            }

            $bytes .= ConvertBytes::fromShort($sub_block->getAttribute('id'), $byte_order);
            $bytes .= ConvertBytes::fromShort($sub_block->getFormat(), $byte_order);
            $bytes .= ConvertBytes::fromLong($sub_block->getComponents(), $byte_order);

            $data = $sub_block->toBytes($byte_order, $data_area_offset);
            $s = strlen($data);
            if ($s > 4) {
                $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
                $data_area_bytes .= $data;
                $data_area_offset += $s;
            } else {
                // Copy data directly, pad with NULL bytes as necessary to
                // fill out the four bytes available.
                $bytes .= $data . str_repeat(chr(0), 4 - $s);
            }
        }

        // Thumbnail.
        if ($thumbnail) {
            $thumbnail_entry = $thumbnail->getElement('entry');
            // Add offset.
            $bytes .= ConvertBytes::fromShort($this->getCollection()->getItemCollectionByName('ThumbnailOffset')->getPropertyValue('item'), $byte_order);
            $bytes .= ConvertBytes::fromShort(ItemFormat::LONG, $byte_order);
            $bytes .= ConvertBytes::fromLong(1, $byte_order);
            $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
            // Add length.
            $bytes .= ConvertBytes::fromShort($this->getCollection()->getItemCollectionByName('ThumbnailLength')->getPropertyValue('item'), $byte_order);
            $bytes .= ConvertBytes::fromShort(ItemFormat::LONG, $byte_order);
            $bytes .= ConvertBytes::fromLong(1, $byte_order);
            $bytes .= ConvertBytes::fromLong($thumbnail_entry->getComponents(), $byte_order);
            // Add thumbnail.
            $data_area_bytes .= $thumbnail_entry->toBytes();
            $data_area_offset += $thumbnail_entry->getComponents();
        }

        // Append link to next IFD.
        if ($has_next_ifd) {
            $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
        } else {
            $bytes .= ConvertBytes::fromLong(0, $byte_order);
        }

        // Append data area.
        $bytes .= $data_area_bytes;

if ($this->getAttribute('name') === 'CanonFilterInfo') dump($n, MediaProbe::dumpHexFormatted($bytes));
        return $bytes;
    }

    /**
     * xx
     * @param DataWindow $data_element
     *            the data from which the thumbnail will be
     *            extracted.
     */
    public static function thumbnailToBlock(DataElement $data_element, Ifd $ifd)
    {
        if (!$ifd->getElement("tag[@name='ThumbnailOffset']") || !$ifd->getElement("tag[@name='ThumbnailLength']")) {
            return;
        }

        $ifd->debug("Processing Thumbnail");

        // Get Thumbnail's offset and size.
        $offset = $ifd->getElement("tag[@name='ThumbnailOffset']/entry")->getValue();
        $length = $ifd->getElement("tag[@name='ThumbnailLength']/entry")->getValue();

        // Remove the tags that describe the Thumbnail.
        $ifd->removeElement("tag[@name='ThumbnailOffset']");
        $ifd->removeElement("tag[@name='ThumbnailLength']");

        // Load the thumbnail only if both the offset and the length are
        // available and positive.
        if ($offset <= 0 || $length <= 0) {
            $ifd->error('Invalid offset ({offset}) or length ({length}) for JPEG thumbnail.', [
                'offset' => $offset,
                'length' => $length,
            ]);
            $ifd->valid = false;
            return;
        }

        if ($offset > $data_element->getSize()) {
            $ifd->error('Offset {offset} overflows total size ({size}) for JPEG thumbnail.', [
                'offset' => $offset,
                'size' => $data_element->getSize(),
            ]);
            $ifd->valid = false;
            return;
        }

        // Some images have a broken length, so we try to carefully check
        // the length before we store the thumbnail.
        if ($offset + $length > $data_element->getSize()) {
            $ifd->warning('Thumbnail length ({length} bytes) adjusted to {adjusted_length} bytes.', [
                'length' => $length,
                'adjusted_length' => $data_element->getSize() - $offset,
            ]);
            $length = $data_element->getSize() - $offset;
        }

        // Now set the thumbnail normally.
        try {
            $dataxx = new DataWindow($data_element, $offset, $length);
            // xx todo $dataxx->logInfo($ifd->getLogger());
            $size = $dataxx->getSize();

            // Now move backwards until we find the EOI JPEG marker.
            while ($dataxx->getByte($size - 2) !== Jpeg::JPEG_DELIMITER || $dataxx->getByte($size - 1) != Collection::get('Jpeg')->getItemCollectionByName('EOI')->getPropertyValue('item')) {
                $size --;
            }
            if ($size != $dataxx->getSize()) {
                $ifd->warning('Decrementing thumbnail size to {size} bytes', [
                    'size' => $size,
                ]);
            }
            $thumbnail_data = $dataxx->getBytes(0, $size);

            $thumbnail_block = new Thumbnail(Collection::get('Thumbnail'), $ifd);
            $thumbnail_block->debug('JPEG thumbnail found at offset {offset} of length {length}', [
                'offset' => $offset,
                'length' => $length,
            ]);
            new Undefined($thumbnail_block, [$thumbnail_data]);
            $thumbnail_block->valid = true;
        } catch (DataException $e) {
            $ifd->error($e->getMessage());
        }
    }

    /**
     * Converts a maker note tag to an IFD structure for dumping.
     *
     * @param DataWindow $d
     *            the data window that will provide the data.
     * @param Ifd $ifd
     *            the root Ifd object.
     */
    public static function makerNoteToBlock(DataElement $d, Ifd $ifd)
    {
        // Get the Exif subIfd if existing.
        if (!$exif_ifd = $ifd->getElement("ifd[@name='ExifIFD']")) {
            return;
        }

        // Get MakerNote tag from Exif IFD.
        if (!$maker_note_tag = $exif_ifd->getElement("tag[@name='MakerNote']")) {
            return;
        }

        // Get Make tag from IFD0.
        if (!$make_tag = $ifd->getElement("tag[@name='Make']")) {
            return;
        }

        // Get Model tag from IFD0.
        $model_tag = $ifd->getElement("tag[@name='Model']");
        $model = $model_tag && $model_tag->getElement("entry") ? $model_tag->getElement("entry")->getValue() : 'na';  // xx modelTag should always have an entry, so the check is irrelevant but a test fails

        // Get maker note collection.
        if (!$maker_note_collection = static::getMakerNoteCollection($make_tag->getElement("entry")->getValue(), $model)) {
            return;
        }

        // Load maker note into IFD.
        $ifd_class = $maker_note_collection->getPropertyValue('class');
        $maker_note_ifd_name = $maker_note_collection->getPropertyValue('item');  // xx why not name?? it used to work
        $exif_ifd->debug("**** Parsing {makernote} maker notes", [
            'makernote' => $maker_note_ifd_name,
        ]);
        $item_definition = new ItemDefinition($maker_note_collection, $maker_note_tag->getFormat(), $maker_note_tag->getComponents());
        $ifd = new $ifd_class($item_definition, $exif_ifd, $maker_note_tag);

        // xxx
        $ifd->setAttribute('id', 37500);
        $ifd->setAttribute('name', $maker_note_ifd_name);
        $data = new DataWindow($d, $maker_note_tag->getElement("entry")->getValue()[1]);
        $ifd->parseData($data, -$maker_note_tag->getElement("entry")->getValue()[1]);

        // Remove the MakerNote tag that has been converted to IFD.
        $exif_ifd->removeElement("tag[@name='MakerNote']");
    }

    /**
     * Determines the Collection of the maker notes.
     *
     * @param string $make
     *            the value of IFD0/Make.
     * @param string $model
     *            the value of IFD0/Model.
     *
     * @return Collection|null
     *            the Collection object describing the maker notes, or null if
     *            no specification exists.
     */
    protected static function getMakerNoteCollection($make, $model)
    {
        $maker_notes_collection = Collection::get('MakerNotes');
        foreach ($maker_notes_collection->listItemIds() as $maker_note_collection_id) {
            $maker_note_collection = $maker_notes_collection->getItemCollection($maker_note_collection_id);
            if ($maker_note_collection->getPropertyValue('make') === $make) {
                return $maker_note_collection;
            }
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function debugBlockInfo(?DataElement $data_element = null, int $items_count = 0)
    {
        $msg = '#{seq} {node}:{name}';
        $seq = $this->getDefinition()->getSequence() + 1;
        if ($this->getParentElement() && ($parent_name = $this->getParentElement()->getAttribute('name'))) {
            $seq = $parent_name . '.' . $seq;
        }
        $node = $this->DOMNode->nodeName;
        $name = $this->getAttribute('name');
        $item = $this->getAttribute('id');
        if ($item ==! null) {
            $msg .= ' ({item})';
        }
        if (is_numeric($item)) {
            $item = $item . '/0x' . strtoupper(dechex($item));
        }
        if ($data_element instanceof DataWindow) {
            $msg .= ' @{offset}, {tags} entries';
            $offset = $data_element->getAbsoluteOffset($this->getDefinition()->getDataOffset()) . '/0x' . strtoupper(dechex($data_element->getAbsoluteOffset($this->getDefinition()->getDataOffset())));
        } else {
            $msg .= ' {tags} entries';
        }
        $this->debug($msg, [
            'seq' => $seq,
            'node' => $node,
            'name' => $name,
            'item' => $item,
            'offset' => $offset ?? null,
            'tags' => $items_count,
        ]);
    }
}
