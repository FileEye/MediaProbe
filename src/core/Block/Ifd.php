<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Spec;

/**
 * Class representing an Image File Directory (IFD).
 */
class Ifd extends IfdBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        // Get the number of entries.
        $n = $this->getEntriesCountFromData($data_element, $offset);

        // Load the blocks.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            $entry = $this->getEntryFromData($i, $data_element, $i_offset, $this->getType());

            // If the entry is an IFD, checks the offset.
            if (is_subclass_of($entry['class'], 'ExifEye\core\Block\IfdBase') && $data_element->getLong($i_offset + 8) <= $offset) {
                $this->error('Invalid offset pointer to IFD: {offset}.', [
                    'offset' => $entry['data_offset'],
                ]);
                continue;
            }

            $handling_class = $entry['type'] === 'tag' ? 'ExifEye\core\Block\Tag' : $entry['class'];
            $ifd_entry = new $handling_class($this, $entry['type'], $entry['id'], $entry['name'], $entry['format'], $entry['components']);

            if ($entry['type'] === 'tag') {
                $tag_entry_arguments = call_user_func($entry['class'] . '::getInstanceArgumentsFromTagData', $this, $entry['format'], $entry['components'], $data_element, $entry['data_offset']);
                $entryxx = new $entry['class']($ifd_entry, $tag_entry_arguments);
                $this->debug("Text: {text}", [
                    'text' => $entryxx->toString(),
                ]);
            } else {
                try {
                    $ifd_entry->loadFromData($data_element, $data_element->getLong($i_offset + 8), $size, $entry);
                } catch (DataException $e) {
                    $this->error($e->getMessage());
                }
            }
        }

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);

        return $this;
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
            if ($sub_block->getType() === 'thumbnail') {
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
            $bytes .= ConvertBytes::fromShort(Spec::getElementIdByName($this->getType(), 'ThumbnailOffset'), $byte_order);
            $bytes .= ConvertBytes::fromShort(Spec::getFormatIdFromName('Long'), $byte_order);
            $bytes .= ConvertBytes::fromLong(1, $byte_order);
            $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
            // Add length.
            $bytes .= ConvertBytes::fromShort(Spec::getElementIdByName($this->getType(), 'ThumbnailLength'), $byte_order);
            $bytes .= ConvertBytes::fromShort(Spec::getFormatIdFromName('Long'), $byte_order);
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
     * @param DataWindow $data_element
     *            the data from which the thumbnail will be
     *            extracted.
     */
    public static function thumbnailToBlock(DataElement $data_element, Ifd $ifd)
    {
        if (!$ifd->getElement("tag[@name='ThumbnailOffset']") || !$ifd->getElement("tag[@name='ThumbnailLength']")) {
            return;
        }

        $offset = $ifd->getElement("tag[@name='ThumbnailOffset']/entry")->getValue();
        $length = $ifd->getElement("tag[@name='ThumbnailLength']/entry")->getValue();

        // Load the thumbnail only if both the offset and the length are
        // available and positive.
        if ($offset <= 0 || $length <= 0) {
            $ifd->error('Invalid offset ({offset}) or length ({length}) for JPEG thumbnail.', [
                'offset' => $offset,
                'length' => $length,
            ]);
            return;
        }

        if ($offset > $data_element->getSize()) {
            $ifd->error('Offset {offset} overflows total size ({size}) for JPEG thumbnail.', [
                'offset' => $offset,
                'size' => $data_element->getSize(),
            ]);
            return;
        }

        $ifd->debug("Processing Thumbnail");

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
            //$dataxx = $data_element->getClone($offset, $length);
            $dataxx = new DataWindow($data_element, $offset, $length, $data_element->getByteOrder());
            $dataxx->debug($ifd);
            $size = $dataxx->getSize();

            // Now move backwards until we find the EOI JPEG marker.
            while ($dataxx->getByte($size - 2) !== JpegSegment::JPEG_DELIMITER || $dataxx->getByte($size - 1) != Spec::getElementIdByName('jpeg', 'EOI')) {
                $size --;
            }
            if ($size != $dataxx->getSize()) {
                $ifd->warning('Decrementing thumbnail size to {size} bytes', [
                    'size' => $size,
                ]);
            }
            //$thumbnail_data = $dataxx->getClone(0, $size)->getBytes(0, $size);
            $thumbnail_data = $dataxx->getBytes(0, $size);

            $thumbnail_block = new Thumbnail('thumbnail', $ifd);
            new Undefined($thumbnail_block, [$thumbnail_data]);
            $thumbnail_block->debug('JPEG thumbnail found at offset {offset} of length {length}', [
                'offset' => $offset,
                'length' => $length,
            ]);

            // Remove the tags that have been converted to Thumbnail.
            $ifd->removeElement("tag[@name='ThumbnailOffset']");
            $ifd->removeElement("tag[@name='ThumbnailLength']");

            $ifd->debug(".....END Loading Thumbnail");
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
        if (!$exif_ifd = $ifd->getElement("ifd[@name='Exif']")) {
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

        // Get maker note IFD id.
        if (!$maker_note_ifd_type = Spec::getMakerNoteIfdType($make_tag->getElement("entry")->getValue(), $model)) {
            return;
        }

        // Load maker note into IFD.
        $ifd_class = Spec::getTypePropertyValue($maker_note_ifd_type, 'class');
        $maker_note_ifd_name = Spec::getTypePropertyValue($maker_note_ifd_type, 'name');
        $exif_ifd->debug("Converting {makernote} to IFD", [
            'makernote' => $maker_note_ifd_name,
        ]);
        $ifd = new $ifd_class($exif_ifd, $maker_note_ifd_type, $maker_note_tag->getAttribute('id'), $maker_note_ifd_name, $maker_note_tag->getFormat(), $maker_note_tag->getComponents(), $maker_note_tag);
        $ifd->loadFromData($d, $maker_note_tag->getElement("entry")->getValue()[1], null, [
            'components' => $maker_note_tag->getComponents(),
        ]);
        // Remove the MakerNote tag that has been converted to IFD.
        $exif_ifd->removeElement("tag[@name='MakerNote']");
    }
}
