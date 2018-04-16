<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Exception\IfdException;
use ExifEye\core\Block\Tag;
use ExifEye\core\DataWindow;
use ExifEye\core\DataWindowOffsetException;
use ExifEye\core\DataWindowWindowException;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\InvalidArgumentException;
use ExifEye\core\InvalidDataException;
use ExifEye\core\JpegMarker;
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
     * The type of this directory.
     *
     * Initialized in the constructor.
     *
     * @var int
     */
    protected $type;

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
     * Sub-directories pointed to by this directory.
     *
     * This will be an array of ({@link PelTag}, {@link Ifd}) pairs.
     *
     * @var array
     */
    protected $sub = [];

    /**
     * The thumbnail data.
     *
     * This will be initialized in the constructor, or be left as null
     * if there are no thumbnail as part of this directory.
     *
     * @var DataWindow
     */
    protected $thumb_data = null;
    // TODO: use this format to choose between the
    // JPEG_INTERCHANGE_FORMAT and STRIP_OFFSETS tags.
    // private $thumb_format;

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
    public function __construct($type)
    {
        if (Spec::getIfdType($type) === null) {
            throw new IfdException('Unknown IFD type: %d', $type);
        }

        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public static function loadFromData(DataWindow $data_window, $offset, $options = [])
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

        $thumb_offset = 0;
        $thumb_length = 0;

        /* Read the number of tags */
        $n = $d->getShort($offset + $this->headerSkipBytes);
        ExifEye::debug(
            str_repeat("  ", $nesting_level) . "** Constructing IFD '%s' with %d TAGs at offset %d from %d bytes...",
            $this->getName(),
            $n,
            $offset,
            $d->getSize()
        );

        $offset += 2 + $this->headerSkipBytes;

        /* Check if we have enough data. */
        if ($offset + 12 * $n > $d->getSize()) {
            $n = floor(($offset - $d->getSize()) / 12);
            ExifEye::maybeThrow(new IfdException('Adjusted to: %d.', $n));
        }

        for ($i = 0; $i < $n; $i++) {
            $tag = Tag::loadFromData($d, $offset + 12 * $i, [
                'ifd_id' => $this->getType(),
                'ifd_offset' => $offset,
                'tagsAbsoluteOffset' => $this->tagsAbsoluteOffset,
                'tagsSkipOffset' => $this->tagsSkipOffset,
            ]);

            // Invalid TAG.
            if (!$tag) {
                ExifEye::maybeThrow(
                    new IfdException("Invalid TAG 0x0000 in IFD '%s'", $this->getName())
                );
                continue;
            }

/*            ExifEye::debug(
                str_repeat("  ", $nesting_level) . 'Tag 0x%04X: (%s) Fmt: %d (%s) Components: %d Value: %d%s (%d of %d)...',
                $tag->getId(),
                $tag->hasSpecification() ? $tag->getName() : '* Unknown *',
                $tag->getFormat(),
                Format::getName($tag->getFormat()),
                $tag->getComponents(),
                $tag->getDataElement(),
                $tag->isOffset() ? ' (offset)' : '',
                $i + 1,
                $n
            );*/

            // Check if PEL can support this TAG.
            if (!$this->isValidTag($tag->getId())) {
                ExifEye::maybeThrowNoDebug(
                    new IfdException(
                        "Unknown TAG 0x%04X in IFD '%s'",
                        $tag->getId(),
                        $this->getName()
                    )
                );
            }

            // Load a subIfd.
            if (Spec::isTagAnIfdPointer($this->type, $tag->getId())) {
                // If the tag is an IFD pointer, loads the IFD.
                $type = Spec::getIfdIdFromTag($this->type, $tag->getId());
                $o = $d->getLong($offset + 12 * $i + 8);
                if ($starting_offset != $o) {
                    $ifd_class = Spec::getIfdClass($type);
                    $ifd = new $ifd_class($type);
                    try {
                        $ifd->load($d, $o, $tag->getComponents(), $nesting_level + 1);
                        $this->sub[$type] = $ifd;
                    } catch (DataWindowOffsetException $e) {
                        ExifEye::maybeThrow(new IfdException($e->getMessage()));
                    }
                } else {
                    ExifEye::maybeThrow(new IfdException('Bogus offset to next IFD: %d, same as offset being loaded from.', $o));
                }
                continue;
            }

            // Manage Thumbnail data.
            if (Spec::getTagName($this->type, $tag->getId()) === 'JPEGInterchangeFormat') {
                // Aka 'Thumbnail Offset'.
                $thumb_offset = $d->getLong($offset + 12 * $i + 8);
                $this->safeSetThumbnail($d, $thumb_offset, $thumb_length);
                continue;
            }
            if (Spec::getTagName($this->type, $tag->getId()) === 'JPEGInterchangeFormatLength') {
                // Aka 'Thumbnail Length'.
                $thumb_length = $d->getLong($offset + 12 * $i + 8);
                $this->safeSetThumbnail($d, $thumb_offset, $thumb_length);
                continue;
            }

            // Append the TAG to the IFD.
            $this->xxAppendSubBlock($tag);
        }

        /* Offset to next IFD */
        $o = $d->getLong($offset + 12 * $n);
        ExifEye::debug(str_repeat("  ", $nesting_level) . 'Current offset is %d, link at %d points to %d.', $offset, $offset + 12 * $n, $o);

        if ($o > 0) {
            /* Sanity check: we need 6 bytes */
            if ($o > $d->getSize() - 6) {
                ExifEye::maybeThrow(new IfdException('Bogus offset to next IFD: ' . '%d > %d!', $o, $d->getSize() - 6));
            } else {
                if (Spec::getIfdType($this->type) === '1') {
                    // IFD1 shouldn't link further...
                    ExifEye::maybeThrow(new IfdException('IFD1 links to another IFD!'));
                }
                $this->next = new Ifd(Spec::getIfdIdByType('1'));
                $this->next->load($d, $o);
            }
        }

        ExifEye::debug(str_repeat("  ", $nesting_level) . "** End of loading IFD '%s'.", $this->getName());

        // Invoke post-load callbacks.
        foreach (Spec::getIfdPostLoadCallbacks($this->type) as $callback) {
            call_user_func($callback, $d, $this);
        }
    }

    /**
     * Extract thumbnail data safely.
     *
     * It is safe to call this method repeatedly with either the offset
     * or the length set to zero, since it requires both of these
     * arguments to be positive before the thumbnail is extracted.
     *
     * When both parameters are set it will check the length against the
     * available data and adjust as necessary. Only then is the
     * thumbnail data loaded.
     *
     * @param DataWindow $d
     *            the data from which the thumbnail will be
     *            extracted.
     *
     * @param int $offset
     *            the offset into the data.
     *
     * @param int $length
     *            the length of the thumbnail.
     */
    protected function safeSetThumbnail(DataWindow $d, $offset, $length)
    {
        /*
         * Load the thumbnail if both the offset and the length is
         * available.
         */
        if ($offset > 0 && $length > 0) {
            /*
             * Some images have a broken length, so we try to carefully
             * check the length before we store the thumbnail.
             */
            if ($offset + $length > $d->getSize()) {
                ExifEye::maybeThrow(
                    new IfdException(
                        'Thumbnail length %d bytes ' . 'adjusted to %d bytes.',
                        $length,
                        $d->getSize() - $offset
                    )
                );
                $length = $d->getSize() - $offset;
            }

            /* Now set the thumbnail normally. */
            try {
                $this->setThumbnail($d->getClone($offset, $length));
            } catch (DataWindowWindowException $e) {
                ExifEye::maybeThrow(new IfdException($e->getMessage()));
            }
        }
    }

    /**
     * Set thumbnail data.
     *
     * Use this to embed an arbitrary JPEG image within this IFD. The
     * data will be checked to ensure that it has a proper {@link
     * JpegMarker::EOI} at the end. If not, then the length is
     * adjusted until one if found. An {@link IfdException} might be
     * thrown (depending on {@link ExifEye::$strict}) this case.
     *
     * @param DataWindow $d
     *            the thumbnail data.
     */
    public function setThumbnail(DataWindow $d)
    {
        $size = $d->getSize();
        /* Now move backwards until we find the EOI JPEG marker. */
        while ($d->getByte($size - 2) != 0xFF || $d->getByte($size - 1) != JpegMarker::EOI) {
            $size --;
        }

        if ($size != $d->getSize()) {
            ExifEye::maybeThrow(new IfdException('Decrementing thumbnail size ' . 'to %d bytes', $size));
        }
        $this->thumb_data = $d->getClone(0, $size);
    }

    /**
     * Get the type of this directory.
     *
     * @return int the type of this directory, as identified in Spec.
     */
    public function getType()
    {
        return $this->type;
    }

    public function getTagByName($tag_name)
    {
        foreach ($this->xxGetSubBlocks() as $sub_block) {
            if ($sub_block->getName() === $tag_name) {
                return $sub_block;
            }
        }
        return null;
    }

    public function xxGetTagById($tag_id)
    {
        foreach ($this->xxGetSubBlocks() as $sub_block) {
            if ($sub_block->getId() === $tag_id) {
                return $sub_block;
            }
        }
        return null;
    }

    /**
     * Is a given tag valid for this IFD?
     *
     * Different types of IFDs can contain different kinds of tags ---
     * the {@link IFD0} type, for example, cannot contain a {@link
     * PelTag::GPS_LONGITUDE} tag.
     *
     * A special exception is tags with values above 0xF000. They are
     * treated as private tags and will be allowed everywhere (use this
     * for testing or for implementing your own types of tags).
     *
     * @param int $tag
     *            the tag.
     *
     * @return boolean true if the tag is considered valid in this IFD,
     *         false otherwise.
     *
     * @see getValidTags()
     */
    public function isValidTag($tag)
    {
        return $tag > 0xF000 || in_array($tag, $this->getValidTags());
    }

    /**
     * Returns a list of valid tags for this IFD.
     *
     * @return array an array of {@link PelTag}s which are valid for
     *         this IFD.
     */
    public function getValidTags()
    {
        return Spec::getIfdSupportedTagIds($this->type);

        /*
         * TODO: Where do these tags belong?
         * PelTag::FILL_ORDER,
         * PelTag::TRANSFER_RANGE,
         * PelTag::JPEG_PROC,
         * PelTag::BATTERY_LEVEL,
         * PelTag::IPTC_NAA,
         * PelTag::INTER_COLOR_PROFILE,
         * PelTag::CFA_REPEAT_PATTERN_DIM,
         */
    }

    /**
     * Get the name of an IFD type.
     *
     * @param int $type
     *            the type of the directory, as identified in Spec.
     *
     * @return string the name of type.
     */
    public static function getTypeName($type)
    {
        if (Spec::getIfdType($type) !== null) {
            return Spec::getIfdType($type);
        }
        throw new IfdException('Unknown IFD type: %d', $type);
    }

    /**
     * Get the name of this directory.
     *
     * @return string the name of this directory.
     */
    public function getName()
    {
        return $this->getTypeName($this->type);
    }

    /**
     * Returns available thumbnail data.
     *
     * @return string the bytes in the thumbnail, if any. If the IFD
     *         does not contain any thumbnail data, the empty string is
     *         returned.
     *
     * @todo Throw an exception instead when no data is available?
     *
     * @todo Return the $this->thumb_data object instead of the bytes?
     */
    public function getThumbnailData()
    {
        if ($this->thumb_data !== null) {
            return $this->thumb_data->getBytes();
        } else {
            return '';
        }
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
     * Add a sub-IFD.
     *
     * Any previous sub-IFD of the same type will be overwritten.
     *
     * @param Ifd $sub
     *            the sub IFD.
     */
    public function addSubIfd(Ifd $sub)
    {
        $this->sub[$sub->type] = $sub;
    }

    /**
     * Return a sub IFD.
     *
     * @param int $type
     *            the type of the sub IFD.
     *
     * @return Ifd the IFD associated with the type, or null if that
     *         sub IFD does not exist.
     */
    public function getSubIfd($type)
    {
        if (isset($this->sub[$type])) {
            return $this->sub[$type];
        } else {
            return null;
        }
    }

    /**
     * Get all sub IFDs.
     *
     * @return array an associative array with (IFD-type, {@link
     *         Ifd}) pairs.
     */
    public function getSubIfds()
    {
        return $this->sub;
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

        ExifEye::debug('Bytes from IDF will start at offset %d within Exif data', $offset);

        $n = count($this->xxGetSubBlocks()) + count($this->sub);
        if ($this->thumb_data !== null) {
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

        foreach ($this->xxGetSubBlocks() as $tag => $sub_block) {
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
                ExifEye::debug('Data size %d too big, storing at offset %d instead.', $s, $end);
                $bytes .= ConvertBytes::fromLong($end, $order);
                $extra_bytes .= $data;
                $end += $s;
            } else {
                ExifEye::debug('Data size %d fits.', $s);
                /*
                 * Copy data directly, pad with NULL bytes as necessary to
                 * fill out the four bytes available.
                 */
                $bytes .= $data . str_repeat(chr(0), 4 - $s);
            }
        }

        if ($this->thumb_data !== null) {
            ExifEye::debug('Appending %d bytes of thumbnail data at %d', $this->thumb_data->getSize(), $end);
            // TODO: make EntryInterface a class that can be constructed with
            // arguments corresponding to the newt four lines.
            $bytes .= ConvertBytes::fromShort(Spec::getTagIdByName($this->type, 'JPEGInterchangeFormatLength'), $order);
            $bytes .= ConvertBytes::fromShort(Format::LONG, $order);
            $bytes .= ConvertBytes::fromLong(1, $order);
            $bytes .= ConvertBytes::fromLong($this->thumb_data->getSize(), $order);

            $bytes .= ConvertBytes::fromShort(Spec::getTagIdByName($this->type, 'JPEGInterchangeFormat'), $order);
            $bytes .= ConvertBytes::fromShort(Format::LONG, $order);
            $bytes .= ConvertBytes::fromLong(1, $order);
            $bytes .= ConvertBytes::fromLong($end, $order);

            $extra_bytes .= $this->thumb_data->getBytes();
            $end += $this->thumb_data->getSize();
        }

        /* Find bytes from sub IFDs. */
        $sub_bytes = '';
        foreach ($this->sub as $type => $sub) {
            if (Spec::getIfdType($type) === 'Exif') {
                $tag = Spec::getTagIdByName($this->type, 'ExifIFDPointer');
            } elseif (Spec::getIfdType($type) === 'GPS') {
                $tag = Spec::getTagIdByName($this->type, 'GPSInfoIFDPointer');
            } elseif (Spec::getIfdType($type) === 'Interoperability') {
                $tag = Spec::getTagIdByName($this->type, 'InteroperabilityIFDPointer');
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

        ExifEye::debug('Link to next IFD: %d', $link);

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
        $str = ExifEye::fmt("Dumping IFD %s with %d entries...\n", $this->getName(), count($this->xxGetSubBlocks()));

        foreach ($this->xxGetSubBlocks() as $sub_block) {
            $str .= $sub_block->__toString();
        }
        $str .= ExifEye::fmt("Dumping %d sub IFDs...\n", count($this->sub));

        foreach ($this->sub as $type => $ifd) {
            $str .= $ifd->__toString();
        }
        if ($this->next !== null) {
            $str .= $this->next->__toString();
        }
        return $str;
    }
}
