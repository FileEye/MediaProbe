<?php

namespace FileEye\MediaProbe\Block\Tiff;

use FileEye\MediaProbe\Block\Jpeg\Jpeg;
use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Block\Thumbnail;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Model\EntryInterface;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
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
    public function parseData(DataElement $dataElement, int $start = 0, ?int $size = null, $xxx = 0): void
    {
        $offset = $this->getDefinition()->getDataOffset();

        // Get the number of entries.
        $n = $this->getItemsCountFromData($dataElement, $offset);
        assert($this->debugInfo(['dataElement' => $dataElement, 'itemsCount' => $n]));

        // Parse the items.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            $item_definition = $this->getItemDefinitionFromData($i, $dataElement, $i_offset, $xxx, 'Tiff\IfdAny');
            $item_class = $item_definition->getCollection()->getPropertyValue('handler');

            // Check data is accessible, warn otherwise.
            if ($item_definition->getDataOffset() >= $dataElement->getSize()) {
                $this->warning(
                    'Could not access value for item {item} in \'{ifd}\', overflow',
                    [
                        'item' => MediaProbe::dumpIntHex($item_definition->getCollection()->getPropertyValue('name') ?? 'n/a'),
                        'ifd' => $this->getAttribute('name'),
                    ]
                );
                continue;
            }
/*            $this->debug(
                'Item Offset {o} Components {c} Format {f} Formatsize {fs} Size {s} DataElement Size {des}', [
                    'o' => MediaProbe::dumpIntHex($dataElement->getAbsoluteOffset($item_definition->getDataOffset())),
                    'c' => $item_definition->getValuesCount(),
                    'f' => $item_definition->getFormat(),
                    'fs' => DataFormat::getSize($item_definition->getFormat()),
                    's' => MediaProbe::dumpIntHex($item_definition->getSize()),
                    'des' => MediaProbe::dumpIntHex($dataElement->getSize()),
                ]
            );*/
            if ($item_definition->getDataOffset() +  $item_definition->getSize() > $dataElement->getSize()) {
                $this->warning(
                    'Could not get value for item {item} in \'{ifd}\', not enough data',
                    [
                        'item' => MediaProbe::dumpIntHex($item_definition->getCollection()->getPropertyValue('name') ?? 'n/a'),
                        'ifd' => $this->getAttribute('name'),
                    ]
                );
                continue;
            }

            // Adds the item to the DOM.
            $item = new $item_class($item_definition, $this);
            try {
                if (is_a($item_class, Ifd::class, true)) {
                    $item->parseData($dataElement);
                } else {
                    // In case of an IFD terminator item entry, i.e. zero
                    // components, the data window size is still 4 bytes, from
                    // the IFD index area.
                    $item_data_window_size = $item_definition->getValuesCount() > 0 ? $item_definition->getSize() : 4;
                    $item->parseData($dataElement, $item_definition->getDataOffset(), $item_data_window_size);
                }
            } catch (DataException $e) {
                $item->error($e->getMessage());
                $item->valid = false;
            }
        }

        // Invoke post-load callbacks.
        $this->executePostParseCallbacks($dataElement);
    }

    /**
     * @todo remove, replace by parser
     */
    protected function doParseData(DataElement $data): void
    {
    }

    /**
     * Gets the number of items in the IFD, from the data.
     *
     * Items can be TAGs, other IFDs, etc.
     *
     * @param DataElement $dataElement
     *            the data element that will provide the data.
     * @param int $offset
     *            the offset within the data element where the count can be
     *            found.
     *
     * @return int
     *            the number of items in the IFD.
     */
    protected function getItemsCountFromData(DataElement $dataElement, $offset): int
    {
        // Get the number of tags.
        $entries_count = $dataElement->getShort($offset);

        // Check if we have enough data.
        if (2 + 12 * $entries_count > $dataElement->getSize()) {
            $entries_count = floor(($offset - $dataElement->getSize()) / 12);
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
     * @param DataElement $dataElement
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
    protected function getItemDefinitionFromData(int $seq, DataElement $dataElement, int $offset, int $data_offset_shift = 0, string $fallback_collection_id = null): ItemDefinition
    {
        $id = $dataElement->getShort($offset);
        $format = $dataElement->getShort($offset + 2);

        // Fall back to the generic IFD collection if the item is missing from
        // the appropriate one.
        try {
            $item_collection = $this->getCollection()->getItemCollection($id);
        } catch (MediaProbeException $e) {
            if ($fallback_collection_id !== null) {
                $item_collection = CollectionFactory::get($fallback_collection_id)->getItemCollection($id, 0, 'Tiff\UnknownTag', [
                    'item' => $id,
                    'DOMNode' => 'tag',
                ]);
            } else {
                $item_collection = $this->getCollection()->getItemCollection($id, 0, 'Tiff\UnknownTag', [
                    'item' => $id,
                    'DOMNode' => 'tag',
                ]);
            }
        }

        if (is_a($item_collection->getPropertyValue('handler'), Ifd::class, true)) {
            // If the item is an Ifd, recurse in loading the item at offset.
            $data_offset = $dataElement->getLong($offset + 8);
            $components = $dataElement->getShort($data_offset);
            // The first 2 bytes indicate the number of directory entries contained
            // in the IFD. Then directory entries (12 bytes per entry) follow.
            // After last directory entry, there are  4 bytes indicating the
            // offset to next IFD.
            $size = 2 + $components * DataFormat::getSize($format) + 4;
        } else {
            // The data is a tag.
            $components = $dataElement->getLong($offset + 4);
            // If the data size is bigger than 4 bytes, then actual data is not in
            // the TAG's data element, but at the the offset stored in the data
            // element.
            $size = DataFormat::getSize($format) * $components;
            if ($size > 4) {
                $data_offset = $dataElement->getLong($offset + 8) + $data_offset_shift;
            } else {
                $data_offset = $offset + 8;
            }
        }

        return new ItemDefinition($item_collection, $format, $components, $data_offset, $dataElement->getStart() + $offset, $seq);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
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
            if ($sub_block->getCollection()->getPropertyValue('id') === 'Thumbnail') {
                continue;
            }

            $data = $sub_block->toBytes($byte_order, $data_area_offset);

            $bytes .= ConvertBytes::fromShort($sub_block->getAttribute('id'), $byte_order);
            if ((int) $sub_block->getAttribute('id') === 37500) {
                $bytes .= ConvertBytes::fromShort(DataFormat::UNDEFINED, $byte_order);
                $bytes .= ConvertBytes::fromLong(strlen($data), $byte_order);
            } else {
                $bytes .= ConvertBytes::fromShort($sub_block->getFormat(), $byte_order);
                $bytes .= ConvertBytes::fromLong($sub_block->getComponents(), $byte_order);
            }

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
            $bytes .= ConvertBytes::fromShort(DataFormat::LONG, $byte_order);
            $bytes .= ConvertBytes::fromLong(1, $byte_order);
            $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
            // Add length.
            $bytes .= ConvertBytes::fromShort($this->getCollection()->getItemCollectionByName('ThumbnailLength')->getPropertyValue('item'), $byte_order);
            $bytes .= ConvertBytes::fromShort(DataFormat::LONG, $byte_order);
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

        return $bytes;
    }

    /**
     * xx
     * @param DataWindow $dataElement
     *            the data from which the thumbnail will be
     *            extracted.
     */
    public static function thumbnailToBlock(DataElement $dataElement, Ifd $ifd): void
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

        if ($offset > $dataElement->getSize()) {
            $ifd->error('Offset {offset} overflows total size ({size}) for JPEG thumbnail.', [
                'offset' => $offset,
                'size' => $dataElement->getSize(),
            ]);
            $ifd->valid = false;
            return;
        }

        // Some images have a broken length, so we try to carefully check
        // the length before we store the thumbnail.
        if ($offset + $length > $dataElement->getSize()) {
            $ifd->warning('Thumbnail length ({length} bytes) adjusted to {adjusted_length} bytes.', [
                'length' => $length,
                'adjusted_length' => $dataElement->getSize() - $offset,
            ]);
            $length = $dataElement->getSize() - $offset;
        }

        // Now set the thumbnail normally.
        try {
            $dataxx = new DataWindow($dataElement, $offset, $length);
            // xx todo $dataxx->logInfo($ifd->getLogger());
            $size = $dataxx->getSize();

            // Now move backwards until we find the EOI JPEG marker.
            while ($dataxx->getByte($size - 2) !== Jpeg::JPEG_DELIMITER || $dataxx->getByte($size - 1) != CollectionFactory::get('Jpeg\Jpeg')->getItemCollectionByName('EOI')->getPropertyValue('item')) {
                $size --;
            }
            if ($size != $dataxx->getSize()) {
                $ifd->warning('Decrementing thumbnail size to {size} bytes', [
                    'size' => $size,
                ]);
            }

            $thumbnail = new ItemDefinition(
                CollectionFactory::get('Thumbnail')
            );
            $ifd->addBlock($thumbnail)->parseData($dataxx, 0, $size);
        } catch (DataException $e) {
            $ifd->error($e->getMessage());
        }
    }

    /**
     * Converts a maker note tag to an IFD structure.
     *
     * @param DataWindow $d
     *            the data window that will provide the data.
     * @param Ifd $ifd
     *            the root Ifd object.
     */
    public static function makerNoteToBlock(DataElement $d, Ifd $ifd): void
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
        $ifd_class = $maker_note_collection->getPropertyValue('handler');
        $maker_note_ifd_name = $maker_note_collection->getPropertyValue('item');  // xx why not name?? it used to work
        $exif_ifd->debug("**** Parsing {makernote} maker notes", [
            'makernote' => $maker_note_ifd_name,
        ]);
        $item_definition = new ItemDefinition($maker_note_collection, $maker_note_tag->getFormat(), $maker_note_tag->getComponents());
        $ifd = new $ifd_class($item_definition, $exif_ifd, $maker_note_tag);

        // xxx
        $ifd->setAttribute('id', 37500);
        $ifd->setAttribute('name', $maker_note_ifd_name);
        $data = $maker_note_tag->getElement("entry")->getDataElement();
// dump(MediaProbe::dumpHexFormatted($data->getBytes()));
        // @todo the netting of the dataOffset is a Canon only thing, move to vendor
        // @todo xxx this is incorrect, parsing should happen indepentently from add'l offset
        $ifd->parseData($data, 0, null, -$maker_note_tag->getDefinition()->getDataOffset());

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
     * @return CollectionInterface|null
     *            the Collection object describing the maker notes, or null if
     *            no specification exists.
     */
    protected static function getMakerNoteCollection(string $make, string $model): ?CollectionInterface
    {
        $maker_notes_collection = CollectionFactory::get('ExifMakerNotes\MakerNotes');
        foreach ($maker_notes_collection->listItemIds() as $maker_note_collection_id) {
            $maker_note_collection = $maker_notes_collection->getItemCollection($maker_note_collection_id);
            if ($maker_note_collection->getPropertyValue('make') === $make) {
                return $maker_note_collection;
            }
        }
        return null;
    }

    public function collectInfo(array $context = []): array
    {
        $info = [];

        $parentInfo = parent::collectInfo($context);

        $msg = '#{seq} {node}:{name}';

        $info['seq'] = $this->getDefinition()->getSequence() + 1;
        if ($this->getParentElement() && ($parent_name = $this->getParentElement()->getAttribute('name'))) {
            $info['seq'] = $parent_name . '.' . $info['seq'];
        }

        if (isset($parentInfo['item'])) {
            $msg .= ' ({item})';
            $info['item'] = is_numeric($parentInfo['item']) ? $parentInfo['item'] . '/0x' . strtoupper(dechex($parentInfo['item'])) : $parentInfo['item'];
        }

        if (isset($context['dataElement']) && $context['dataElement'] instanceof DataWindow) {
            $info['offset'] = $context['dataElement']->getAbsoluteOffset($this->getDefinition()->getDataOffset()) . '/0x' . strtoupper(dechex($context['dataElement']->getAbsoluteOffset($this->getDefinition()->getDataOffset())));
        }

        $info['tags'] = $context['itemsCount'] ?? 'n/a';
        $msg .= isset($info['offset']) ? ' @{offset}, {tags} entries' : ' {tags} entries';

        $info['_msg'] = $msg;

        return array_merge($parentInfo, $info);
    }
}
