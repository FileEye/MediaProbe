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
     * The next directory.
     *
     * This will be initialized in the constructor, or be left as null
     * if this is the last directory.
     *
     * @var Ifd
     */
    protected $next = null;

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
     * {@inheritdoc}
     */
    public static function loadFromData(BlockBase $parent, DataWindow $data_window, $offset, $options = [])
    {
        // @todo
    }

    /**
     * Load data into a Image File Directory (IFD).
     *
     * @param DataWindow $d
     *            the data window that will provide the data.
     * @param int $offset
     *            the offset within the window where the directory will
     *            be found.
     * @param int $components
     *            (Optional) the number of components held by this IFD.
     * @param int $nesting_level
     *            (Optional) the level of nesting of this IFD in the overall
     *            structure.
     */
    public function load(DataWindow $d, $offset, $components = 1, $nesting_level = 0)
    {
        $starting_offset = $offset;

        /* Read the number of tags */
        $n = $d->getShort($offset + $this->headerSkipBytes);
        $this->debug("START... Loading with {tags} TAGs at offset {offset} from {total} bytes", [
            'tags' => $n,
            'offset' => $offset,
            'total' => $d->getSize(),
        ]);

        $offset += 2 + $this->headerSkipBytes;

        /* Check if we have enough data. */
        if ($offset + 12 * $n > $d->getSize()) {
            $n = floor(($offset - $d->getSize()) / 12);
            $this->warning('Adjusted to: {tags}.', [
                'tags' => $n,
            ]);
        }

        for ($i = 0; $i < $n; $i++) {
            $tag = Tag::loadFromData($this, $d, $offset + 12 * $i, [
                'ifd_offset' => $offset,
                'tagsAbsoluteOffset' => $this->tagsAbsoluteOffset,
                'tagsSkipOffset' => $this->tagsSkipOffset,
            ]);

            // Invalid TAG.
            if (!$tag) {
                continue;
            }

            // Load a subIfd.
            if (Spec::isTagAnIfdPointer($this->getId(), $tag->getId())) {
                // If the tag is an IFD pointer, loads the IFD.
                $type = Spec::getIfdIdFromTag($this->getId(), $tag->getId());
                $o = $d->getLong($offset + 12 * $i + 8);
                if ($starting_offset != $o) {
                    $ifd_class = Spec::getIfdClass($type);
                    $ifd = new $ifd_class($type, $this);
                    try {
                        $ifd->load($d, $o, $tag->getEntry()->getComponents(), $nesting_level + 1);
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

        /* Offset to next IFD */
        $o = $d->getLong($offset + 12 * $n);
        $this->debug('Current offset is {offset}, link at {link} points to {destination}.', [
            'offset' => $offset,
            'link' => $offset + 12 * $n,
            'destination' => $o,
        ]);

        if ($o > 0) {
            /* Sanity check: we need 6 bytes */
            if ($o > $d->getSize() - 6) {
                $this->error('Bogus offset to next IFD: {offset} > {size}!', [
                    'offset' => $o,
                    'size' => $d->getSize() - 6,
                ]);
            } else {
                if (Spec::getIfdType($this->getId()) === 'IFD1') {
                    // IFD1 shouldn't link further...
                    $this->error('IFD1 links to another IFD!');
                }
                $this->next = new Ifd(Spec::getIfdIdByType('IFD1'));
                $this->next->load($d, $o);
            }
        }

        $this->debug(".....END Loading");

        // Invoke post-load callbacks.
        foreach (Spec::getIfdPostLoadCallbacks($this->getId()) as $callback) {
            $this->debug("START... {callback}", [
                'callback' => $callback,
            ]);
            call_user_func($callback, $d, $this);
            $this->debug(".....END {callback}", [
                'callback' => $callback,
            ]);
        }
    }

    public function xxGetTagById($tag_id)
    {
        foreach ($this->xxGetSubBlocks('Tag') as $sub_block) {
            if ($sub_block->getId() === $tag_id) {
                return $sub_block;
            }
        }
        return null;
    }

    /**
     * Make this directory point to a new directory.
     *
     * @param Ifd $i
     *            the IFD that this directory will point to.
     */
    public function setNextIfd(Ifd $i)
    {
        $this->next = $i;
    }

    /**
     * Return the IFD pointed to by this directory.
     *
     * @return Ifd the next IFD, following this IFD. If this is the
     *         last IFD, null is returned.
     */
    public function getNextIfd()
    {
        return $this->next;
    }

    /**
     * Check if this is the last IFD.
     *
     * @return boolean true if there are no following IFD, false
     *         otherwise.
     */
    public function isLastIfd()
    {
        return $this->next === null;
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
    public function getBytes($offset, $order)
    {
        $bytes = '';
        $extra_bytes = '';

        $this->debug('Bytes from IDF will start at offset {offset} within Exif data', [
            'offset' => $offset,
        ]);

        $n = count($this->xxGetSubBlocks('Tag')) + count($this->xxGetSubBlocks('Ifd'));
        if ($this->xxGetSubBlock('Thumbnail', 0) !== null) {
            /*
             * We need two extra entries for the thumbnail offset and
             * length.
             */
            $n += 2;
        }

        $bytes .= ConvertBytes::fromShort($n, $order);

        /*
         * Initialize offset of extra data. This included the bytes
         * preceding this IFD, the bytes needed for the count of entries,
         * the entries themselves (and sub entries), the extra data in the
         * entries, and the IFD link.
         */
        $end = $offset + 2 + 12 * $n + 4;

        foreach ($this->xxGetSubBlocks('Tag') as $tag => $sub_block) {
            /* Each entry is 12 bytes long. */
            $bytes .= ConvertBytes::fromShort($sub_block->getId(), $order);
            $bytes .= ConvertBytes::fromShort($sub_block->getEntry()->getFormat(), $order);
            $bytes .= ConvertBytes::fromLong($sub_block->getEntry()->getComponents(), $order);

            /*
             * Size? If bigger than 4 bytes, the actual data is not in
             * the entry but somewhere else.
             */
            $data = $sub_block->getEntry()->toBytes($order);
            $s = strlen($data);
            if ($s > 4) {
                $this->debug('Data size {size} too big, storing at offset {offset} instead.', [
                    'size' => $s,
                    'offset' => $end,
                ]);
                $bytes .= ConvertBytes::fromLong($end, $order);
                $extra_bytes .= $data;
                $end += $s;
            } else {
                $this->debug('Data size {size} fits.', [
                    'size' => $s,
                ]);
                /*
                 * Copy data directly, pad with NULL bytes as necessary to
                 * fill out the four bytes available.
                 */
                $bytes .= $data . str_repeat(chr(0), 4 - $s);
            }
        }

        if ($this->xxGetSubBlock('Thumbnail', 0) !== null) {
            $this->debug('Appending {size} bytes of thumbnail data at {offset}', [
                'size' => $this->xxGetSubBlock('Thumbnail', 0)->getEntry()->getComponents(),
                'offset' => $end,
            ]);
            // TODO: make EntryInterface a class that can be constructed with
            // arguments corresponding to the next four lines.
            $bytes .= ConvertBytes::fromShort(Spec::getTagIdByName($this->getId(), 'ThumbnailLength'), $order);
            $bytes .= ConvertBytes::fromShort(Format::LONG, $order);
            $bytes .= ConvertBytes::fromLong(1, $order);
            $bytes .= ConvertBytes::fromLong($this->xxGetSubBlock('Thumbnail', 0)->getEntry()->getComponents(), $order);

            $bytes .= ConvertBytes::fromShort(Spec::getTagIdByName($this->getId(), 'ThumbnailOffset'), $order);
            $bytes .= ConvertBytes::fromShort(Format::LONG, $order);
            $bytes .= ConvertBytes::fromLong(1, $order);
            $bytes .= ConvertBytes::fromLong($end, $order);

            $extra_bytes .= $this->xxGetSubBlock('Thumbnail', 0)->getEntry()->toBytes();
            $end += $this->xxGetSubBlock('Thumbnail', 0)->getEntry()->getComponents();
        }

        /* Find bytes from sub IFDs. */
        $sub_bytes = '';
        foreach ($this->xxGetSubBlocks('Ifd') as $sub) {
            if (Spec::getIfdType($sub->getType()) === 'Exif') {
                $tag = Spec::getTagIdByName($this->getId(), 'ExifIFDPointer');
            } elseif (Spec::getIfdType($sub->getType()) === 'GPS') {
                $tag = Spec::getTagIdByName($this->getId(), 'GPSInfoIFDPointer');
            } elseif (Spec::getIfdType($sub->getType()) === 'Interoperability') {
                $tag = Spec::getTagIdByName($this->getId(), 'InteroperabilityIFDPointer');
            } else {
                // ConvertBytes::BIG_ENDIAN is the default used by Convert
                $tag = ConvertBytes::BIG_ENDIAN;
            }
            /* Make an aditional entry with the pointer. */
            $bytes .= ConvertBytes::fromShort($tag, $order);
            /* Next the format, which is always unsigned long. */
            $bytes .= ConvertBytes::fromShort(Format::LONG, $order);
            /* There is only one component. */
            $bytes .= ConvertBytes::fromLong(1, $order);

            $data = $sub->getBytes($end, $order);
            $s = strlen($data);
            $sub_bytes .= $data;

            $bytes .= ConvertBytes::fromLong($end, $order);
            $end += $s;
        }

        /* Make link to next IFD, if any */
        if ($this->isLastIFD()) {
            $link = 0;
        } else {
            $link = $end;
        }

        $this->debug('Link to next IFD: {link}', [
            'link' => $link,
        ]);

        $bytes .= ConvertBytes::fromLong($link, $order);

        $bytes .= $extra_bytes . $sub_bytes;

        if (! $this->isLastIfd()) {
            $bytes .= $this->next->getBytes($end, $order);
        }
        return $bytes;
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
