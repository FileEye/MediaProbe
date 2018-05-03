<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Exception\IfdException;
use ExifEye\core\Block\Tag;
use ExifEye\core\DataWindow;
use ExifEye\core\DataWindowOffsetException;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\InvalidArgumentException;
use ExifEye\core\InvalidDataException;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Spec;

/**
 * Class representing an Image File Directory (IFD).
 *
 * {@link Tiff TIFF data} is structured as a number of Image File
 * Directories, IFDs for short. Each IFD contains a number of {@link
 * EntryInterface entries}, some data and finally a link to the next IFD.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class Ifd extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'Ifd';

    /**
     * The IFD header bytes to skip.
     *
     * @var array
     */
    protected $headerSkipBytes = 0;

    /**
     * Defines if tags in the IFD point to absolute offset.
     *
     * @var array
     */
    protected $tagsAbsoluteOffset = true;

    /**
     * The offset skip for tags.
     *
     * @var array
     */
    protected $tagsSkipOffset = 0;

    /**
     * Construct a new Image File Directory (IFD).
     *
     * The IFD will be empty, use the {@link addEntry()} method to add
     * an {@link EntryInterface}. Use the {@link setNext()} method to link
     * this IFD to another.
     *
     * @param int $type
     *            the type of this IFD, as found in Spec. A
     *            {@link IfdException} will be thrown if unknown.
     */
    public function __construct($id, $parent = null)
    {
        if (Spec::getIfdType($id) === null) {
            throw new IfdException('Unknown IFD type: %d', $id);
        }
        $this->id = $id;
        $this->name = Spec::getIfdType($id);
        $this->hasSpecification = (bool) $this->name;

        if ($parent) {
            $this->setParentElement($parent);
        }
    }

    /**
     * Load data into a Image File Directory (IFD).
     *
     * @param DataWindow $data_window
     *            the data window that will provide the data.
     * @param int $offset
     *            the offset within the window where the directory will
     *            be found.
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        $starting_offset = $offset;

        // Get the number of tags.
        $n = $data_window->getShort($offset + $this->headerSkipBytes);
        $this->debug("START... Loading with {tags} TAGs at offset {offset} from {total} bytes", [
            'tags' => $n,
            'offset' => $offset,
            'total' => $data_window->getSize(),
        ]);

        $offset += 2 + $this->headerSkipBytes;

        // Check if we have enough data.
        if ($offset + 12 * $n > $data_window->getSize()) {
            $n = floor(($offset - $data_window->getSize()) / 12);
            $this->warning('Adjusted to: {tags}.', [
                'tags' => $n,
            ]);
        }

        // Load Tags.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 12 * $i;

            // Gets the TAG's elements from the data window.
            $tag_id = $data_window->getShort($i_offset);
            $tag_format = $data_window->getShort($i_offset + 2);
            $tag_components = $data_window->getLong($i_offset + 4);
            $tag_data_element = $data_window->getLong($i_offset + 8);

            // If the data size is bigger than 4 bytes, then actual data is not in
            // the TAG's data element, but at the the offset stored in the data
            // element.
            $tag_size = Format::getSize($tag_format) * $tag_components;
            if ($tag_size > 4) {
                $tag_data_offset = $tag_data_element;
                if (!$this->tagsAbsoluteOffset) {
                    $tag_data_offset += $offset;
                }
                $tag_data_offset += $this->tagsSkipOffset;
            } else {
                $tag_data_offset = $i_offset + 8;
            }

            // Build the TAG object.
            $tag_entry_class = Spec::getEntryClass($this->getId(), $tag_id, $tag_format);
            $tag_entry_arguments = call_user_func($tag_entry_class . '::getInstanceArgumentsFromTagData', $tag_format, $tag_components, $data_window, $tag_data_offset);
            $tag = new Tag($this, $tag_id, $tag_entry_class, $tag_entry_arguments, $tag_format, $tag_components);

            // Load a subIfd.
            if (Spec::isTagAnIfdPointer($this->getId(), $tag->getId())) {
                // If the tag is an IFD pointer, loads the IFD.
                $type = Spec::getIfdIdFromTag($this->getId(), $tag->getId());
                $o = $data_window->getLong($offset + 12 * $i + 8);
                if ($starting_offset != $o) {
                    $ifd_class = Spec::getIfdClass($type);
                    $ifd = new $ifd_class($type, $this);
                    try {
                        $ifd->loadFromData($data_window, $o, ['components' => $tag->getEntry()->getComponents()]);
                        $this->xxAddSubBlock($ifd);
                    } catch (DataWindowOffsetException $e) {
                        $this->error($e->getMessage());
                    }
                } else {
                    $this->error('Bogus offset to next IFD: {offset}, same as offset being loaded from.', [
                        'offset' => $o,
                    ]);
                }
                continue;
            }

            // Append the TAG to the IFD.
            $this->xxAppendSubBlock($tag);
        }

        $this->debug(".....END Loading");

        // Invoke post-load callbacks.
        foreach (Spec::getIfdPostLoadCallbacks($this->getId()) as $callback) {
            $this->debug("START... {callback}", [
                'callback' => $callback,
            ]);
            call_user_func($callback, $data_window, $this);
            $this->debug(".....END {callback}", [
                'callback' => $callback,
            ]);
        }

        return $data_window->getLong($offset + 12 * $n);
    }

    /**
     * Turn this directory into bytes.
     *
     * This directory will be turned into a byte string, with the
     * specified byte order. The offsets will be calculated from the
     * offset given.
     *
     * @param int $offset
     *            the offset of the first byte of this directory.
     *
     * @param boolean $order
     *            the byte order that should be used when
     *            turning integers into bytes. This should be one of {@link
     *            ConvertBytes::LITTLE_ENDIAN} and {@link ConvertBytes::BIG_ENDIAN}.
     */
    public function toBytes($offset, $order)
    {
        $ifd_area = '';
        $data_area = '';

        // Determine number of IFD entries.
        $n = count($this->xxGetSubBlocks('Tag')) + count($this->xxGetSubBlocks('Ifd'));
        if ($this->xxGetSubBlock('Thumbnail', 0) !== null) {
            // We need two extra entries for the thumbnail offset and length.
            $n += 2;
        }
        $ifd_area .= ConvertBytes::fromShort($n, $order);

        // Initialize offset of data area. This included the bytes preceding
        // this IFD, the bytes needed for the count of entries, the entries
        // themselves (and sub entries), the extra data in the entries, and the
        // IFD link.
        $end = $offset + 2 + 12 * $n + 4;

        // Process the Tags.
        foreach ($this->xxGetSubBlocks('Tag') as $tag => $sub_block) {
            // Each entry is 12 bytes long.
            $ifd_area .= ConvertBytes::fromShort($sub_block->getId(), $order);
            $ifd_area .= ConvertBytes::fromShort($sub_block->getEntry()->getFormat(), $order);
            $ifd_area .= ConvertBytes::fromLong($sub_block->getEntry()->getComponents(), $order);

            // Size? If bigger than 4 bytes, the actual data is not in
            // the entry but somewhere else.
            $data = $sub_block->getEntry()->toBytes($order);
            $s = strlen($data);
            if ($s > 4) {
                $ifd_area .= ConvertBytes::fromLong($end, $order);
                $data_area .= $data;
                $end += $s;
            } else {
                // Copy data directly, pad with NULL bytes as necessary to
                // fill out the four bytes available.
                $ifd_area .= $data . str_repeat(chr(0), 4 - $s);
            }
        }

        // Process the Thumbnail. @todo avoid double writing of tags
        if ($this->xxGetSubBlock('Thumbnail', 0)) {
            // TODO: make EntryInterface a class that can be constructed with
            // arguments corresponding to the next four lines.
            $ifd_area .= ConvertBytes::fromShort(Spec::getTagIdByName($this->getId(), 'ThumbnailLength'), $order);
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $order);
            $ifd_area .= ConvertBytes::fromLong(1, $order);
            $ifd_area .= ConvertBytes::fromLong($this->xxGetSubBlock('Thumbnail', 0)->getEntry()->getComponents(), $order);

            $ifd_area .= ConvertBytes::fromShort(Spec::getTagIdByName($this->getId(), 'ThumbnailOffset'), $order);
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $order);
            $ifd_area .= ConvertBytes::fromLong(1, $order);
            $ifd_area .= ConvertBytes::fromLong($end, $order);

            $data_area .= $this->xxGetSubBlock('Thumbnail', 0)->getEntry()->toBytes();
            $end += $this->xxGetSubBlock('Thumbnail', 0)->getEntry()->getComponents();
        }

        // Process sub IFDs.
        $sub_bytes = '';
        foreach ($this->xxGetSubBlocks('Ifd') as $sub) {
            if (Spec::getIfdType($sub->getType()) === 'Exif') {
                $tag = Spec::getTagIdByName($this->getId(), 'ExifIFDPointer');
            } elseif (Spec::getIfdType($sub->getType()) === 'GPS') {
                $tag = Spec::getTagIdByName($this->getId(), 'GPSInfoIFDPointer');
            } elseif (Spec::getIfdType($sub->getType()) === 'Interoperability') {
                $tag = Spec::getTagIdByName($this->getId(), 'InteroperabilityIFDPointer');
            } else {
                // ConvertBytes::BIG_ENDIAN is the default used by Convert.
                $tag = ConvertBytes::BIG_ENDIAN;
            }
            // Make an additional entry with the pointer.
            $ifd_area .= ConvertBytes::fromShort($tag, $order);
            // Next the format, which is always unsigned long.
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $order);
            // There is only one component.
            $ifd_area .= ConvertBytes::fromLong(1, $order);

            $data = $sub->getBytes($end, $order);
            $s = strlen($data);
            $sub_bytes .= $data;

            $ifd_area .= ConvertBytes::fromLong($end, $order);
            $end += $s;
        }

        return ['ifd_area' => $ifd_area, 'data_area' => $data_area];
    }

    /**
     * Turn this directory into text.
     *
     * @return string information about the directory, mainly for
     *         debugging.
     */
    public function __toString()
    {
        $str = ExifEye::fmt(">>>> %s\n", $this->getName());

        // Dump all tags first.
        foreach ($this->xxGetSubBlocks('Tag') as $sub_block) {
            $str .= $sub_block->__toString();
        }

        // Then dump the rest sub-blocks.
        foreach ($this->xxGetSubBlocks() as $type => $sub_blocks) {
            if ($type === 'Tag') {
                continue;
            }
            foreach ($sub_blocks as $sub_block) {
                $str .= $sub_block->__toString();
            }
        }

        return $str;
    }
}
