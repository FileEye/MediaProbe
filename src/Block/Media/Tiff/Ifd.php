<?php

namespace FileEye\MediaProbe\Block\Media\Tiff;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Media\Jpeg;
use FileEye\MediaProbe\Block\Media\Tiff;
use FileEye\MediaProbe\Block\Thumbnail;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Model\EntryInterface;
use FileEye\MediaProbe\Model\RootBlockBase;
use FileEye\MediaProbe\Utility\ConvertBytes;
use FileEye\MediaProbe\Utility\HexDump;

/**
 * Class representing an Image File Directory (IFD).
 *
 * @see https://docs.fileformat.com/image/exif/
 * @see https://www.media.mit.edu/pia/Research/deepview/exif.html
 */
class Ifd extends ListBase
{
    public function __construct(
        public readonly IfdEntryValueObject $ifdEntry,
        Tiff|Ifd|RootBlockBase $parent,
    ) {
        parent::__construct(
            definition: new ItemDefinition(
                collection: $ifdEntry->collection,
                format: $ifdEntry->dataFormat,
                valuesCount: $ifdEntry->countOfComponents,
                dataOffset: $ifdEntry->isOffset ? $ifdEntry->dataOffset() : $ifdEntry->dataValue(),
                sequence: $ifdEntry->sequence,
            ),
            parent: $parent,
            graft: false,
        );
    }

    public function fromDataElement(DataElement $dataElement): Ifd
    {
        # @todo xxx should always be an offset?
        $offset = $this->ifdEntry->isOffset ? $this->ifdEntry->dataOffset() : $this->ifdEntry->dataValue();

        // Get the number of IFD entries.
        $n = $this->ifdEntriesCountFromDataElement($dataElement, $offset);
        assert($this->debugInfo(['dataElement' => $dataElement, 'itemsCount' => $n]));

        // Parse the IFD entries.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;

            $ifdEntry = $this->ifdEntryFromDataElement(
                seq: $i,
                dataElement: $dataElement,
                offset: $i_offset,
                fallbackCollectionId: 'Media\\Tiff\\IfdAny',
            );

            if ($ifdEntry === false) {
                continue;
            }

            // Adds the IFD entry to the DOM.
            $item_class = $ifdEntry->collection->handler();
            try {
                if (is_a($item_class, Ifd::class, true)) {
                    // This is a sub-IFD.
                    $item = new $item_class(
                        ifdEntry: $ifdEntry,
                        parent: $this,
                    );
                    try {
                        $item->fromDataElement($dataElement);
                    } catch (DataException $e) {
                        $item->error($e->getMessage());
                    }
                    $this->graftBlock($item);
                } else {
                    // This is a TAG.
                    // In case of an IFD terminator item entry, i.e. zero
                    // components, the data window size is still 4 bytes, from
                    // the IFD index area.
                    $item = new $item_class(
                        new ItemDefinition(
                            collection: $ifdEntry->collection,
                            format: $ifdEntry->dataFormat,
                            valuesCount: $ifdEntry->countOfComponents,
                            dataOffset: $ifdEntry->isOffset ? $ifdEntry->dataOffset() : $ifdEntry->dataValue(),
                            sequence: $ifdEntry->sequence,
                        ),
                        $this,
                    );
                    $item_data_window_size = $ifdEntry->countOfComponents > 0 ? $ifdEntry->size : 4;
                    if ($ifdEntry->isOffset) {
                        $item->parseData($dataElement, $ifdEntry->dataOffset(), $item_data_window_size);
                    } else {
                        $item->parseData($dataElement, $ifdEntry->dataValue(), $item_data_window_size);
                    }
                }
            } catch (DataException $e) {
                if (isset($item)) {
                    $item->error($e->getMessage());
                }
            }
        }

        // Invoke post-load callbacks.
        $this->executePostParseCallbacks($dataElement);

        return $this;
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
    protected function ifdEntriesCountFromDataElement(DataElement $dataElement, int $offset): int
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
     * Gets the IfdEntryValueObject object of an IFD entry, from the data.
     *
     * @param int $seq
     *            The sequence (0-index) of the item in the IFD.
     * @param DataElement $dataElement
     *            the data element that will provide the data.
     * @param int $offset
     *            the offset within the data element where the count can be
     *            found.
     * @param int $dataDisplacement
     *            (Optional) if specified, an additional shift to the offset
     *            where data can be found.
     */
    protected function ifdEntryFromDataElement(
        int $seq,
        DataElement $dataElement,
        int $offset,
        int $dataDisplacement = 0,
        ?string $fallbackCollectionId = null,
    ): IfdEntryValueObject|false {
        $id = $dataElement->getShort($offset);
        $format = $dataElement->getShort($offset + 2);

        // Fall back to the generic IFD collection if the item is missing from
        // the appropriate one.
        try {
            $item_collection = $this->getCollection()->getItemCollection($id);
        } catch (MediaProbeException $e) {
            if ($fallbackCollectionId !== null) {
                $item_collection = CollectionFactory::get($fallbackCollectionId)->getItemCollection($id, 0, 'Tiff\UnknownTag', [
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

        if (is_a($item_collection->handler(), Ifd::class, true)) {
            // If the item is an Ifd, recurse in loading the item at offset.
            $data_offset = $dataElement->getLong($offset + 8);
            $components = $dataElement->getShort($data_offset);
            // The first 2 bytes indicate the number of directory entries contained in the IFD.
            // Then directory entries (12 bytes per entry) follow. After last directory entry,
            // there are 4 bytes indicating the offset to next IFD.
            $size = 2 + $components * DataFormat::getSize($format) + 4;
        } else {
            // The data is a tag.
            $components = $dataElement->getLong($offset + 4);
            // If the data size is bigger than 4 bytes, then actual data is not in the entry
            // data, but at the the offset stored in the data.
            $size = DataFormat::getSize($format) * $components;
            if ($size > 4) {
                $data_offset = $dataElement->getLong($offset + 8) - $dataDisplacement;
            } else {
                $data_offset = $offset + 8;
            }
        }
        $isOffset = $size > 4;

        // Check data is accessible, error otherwise.
        if ($isOffset && $data_offset >= $dataElement->getSize()) {
            $this->error(
                'Could not access value for item {item} in \'{ifd}\', overflow',
                [
                    'item' => HexDump::dumpIntHex($item_collection->getPropertyValue('name') ?? 'n/a'),
                    'ifd' => $this->getAttribute('name'),
                ]
            );
            return false;
        }
        if ($isOffset && $data_offset +  $size > $dataElement->getSize()) {
            $this->error(
                'Could not get value for item {item} in \'{ifd}\', not enough data',
                [
                    'item' => HexDump::dumpIntHex($item_collection->getPropertyValue('name') ?? 'n/a'),
                    'ifd' => $this->getAttribute('name'),
                ]
            );
            return false;
        }

        return new IfdEntryValueObject(
            sequence: $seq,
            collection: $item_collection,
            dataFormat: $format,
            countOfComponents: $components,
            data: $data_offset,
        );
    }

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
            if ($sub_block instanceof Thumbnail) {
                continue;
            }

            assert($sub_block instanceof Tag || $sub_block instanceof ListBase, get_class($sub_block));

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
            assert($thumbnail_entry instanceof EntryInterface);
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
        assert(is_int($offset));
        $length = $ifd->getElement("tag[@name='ThumbnailLength']/entry")->getValue();
        assert(is_int($length));

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
            return;
        }

        if ($offset > $dataElement->getSize()) {
            $ifd->error('Offset {offset} overflows total size ({size}) for JPEG thumbnail.', [
                'offset' => $offset,
                'size' => $dataElement->getSize(),
            ]);
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
            while ($dataxx->getByte($size - 2) !== Jpeg::JPEG_DELIMITER || $dataxx->getByte($size - 1) != CollectionFactory::get('Media\Jpeg')->getItemCollectionByName('EOI')->getPropertyValue('item')) {
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

    public function collectInfo(array $context = []): array
    {
        $info = [];

        $parentInfo = parent::collectInfo($context);

        $msg = '#{seq} {node}:{name}';

        $info['seq'] = $this->getDefinition()->sequence + 1;
        if ($this->getParentElement() && ($parent_name = $this->getParentElement()->getAttribute('name'))) {
            $info['seq'] = $parent_name . '.' . $info['seq'];
        }

        if (isset($parentInfo['item'])) {
            $msg .= ' ({item})';
            $info['item'] = is_numeric($parentInfo['item']) ? $parentInfo['item'] . '/0x' . strtoupper(dechex($parentInfo['item'])) : $parentInfo['item'];
        }

        if (isset($context['dataElement']) && $context['dataElement'] instanceof DataWindow) {
            $info['offset'] = $context['dataElement']->getAbsoluteOffset($this->getDefinition()->dataOffset) . '/0x' . strtoupper(dechex($context['dataElement']->getAbsoluteOffset($this->getDefinition()->dataOffset)));
        }

        $info['tags'] = $context['itemsCount'] ?? 'n/a';
        $msg .= isset($info['offset']) ? ' @{offset}, {tags} entries' : ' {tags} entries';

        $info['_msg'] = $msg;

        return array_merge($parentInfo, $info);
    }
}
