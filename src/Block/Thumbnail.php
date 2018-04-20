<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Ifd;
use ExifEye\core\DataWindow;
use ExifEye\core\DataWindowWindowException;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\ExifEye;
use ExifEye\core\JpegMarker;
use ExifEye\core\Spec;

/**
 * Class used to hold data for a JPEG Thumbnail.
 */
class Thumbnail extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'Thumbnail';

    /**
     * {@inheritdoc}
     */
    protected $id = -1;

    /**
     * {@inheritdoc}
     */
    protected $name = 'Thumbnail';

    /**
     * Constructs a Thumbnail block object.
     */
    public function __construct(Ifd $ifd, EntryInterface $entry)
    {
        $this->setParentElement($ifd);

        $this->hasSpecification = false;

        $entry->setParentElement($this);
        $this->setEntry($entry);
    }

    /**
     * xx
     * @param DataWindow $data_window
     *            the data from which the thumbnail will be
     *            extracted.
     */
    public static function toBlock(DataWindow $data_window, Ifd $ifd)
    {
        if (!$ifd->getTagByName('ThumbnailOffset') || !$ifd->getTagByName('ThumbnailLength')) {
            return;
        }

        $offset = $ifd->getTagByName('ThumbnailOffset')->getEntry()->getValue();
        $length = $ifd->getTagByName('ThumbnailLength')->getEntry()->getValue();

        // Load the thumbnail only if both the offset and the length are
        // available and positive.
        if ($offset <= 0 || $length <= 0) {
            ExifEye::logger()->warning('{path} Invalid JPEG thumbnail for offset {offset} and length {length}', [
                'path' => $ifd->getElementPath(),
                'offset' => $offset,
                'length' => $length,
            ]);
            return;
        }

        ExifEye::logger()->debug('{path} JPEG thumbnail found at offset {offset} of length {length}', [
            'path' => $ifd->getElementPath(),
            'offset' => $offset,
            'length' => $length,
        ]);

        // Some images have a broken length, so we try to carefully check
        // the length before we store the thumbnail.
        if ($offset + $length > $data_window->getSize()) {
            ExifEye::logger()->warning('Thumbnail length {length} bytes adjusted to {adjusted_length} bytes.', [
                'length' => $length,
                'adjusted_length' => $data_window->getSize() - $offset,
            ]);
            $length = $data_window->getSize() - $offset;
        }

        // Now set the thumbnail normally.
        try {
            $thumbnail_data = static::setThumbnail($data_window->getClone($offset, $length));
            $thumbnail_entry = new Undefined([$thumbnail_data]);
            $thumbnail_block = new static($ifd, $thumbnail_entry);
            $ifd->xxAddSubBlock($thumbnail_block);
        } catch (DataWindowWindowException $e) {
            ExifEye::logger()->error($e->getMessage());
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
    public static function setThumbnail(DataWindow $data_window)
    {
        $size = $data_window->getSize();

        // Now move backwards until we find the EOI JPEG marker.
        while ($data_window->getByte($size - 2) != 0xFF || $data_window->getByte($size - 1) != JpegMarker::EOI) {
            $size --;
        }

        if ($size != $data_window->getSize()) {
            ExifEye::logger()->warning('Decrementing thumbnail size to {size} bytes', [
                'size' => $size,
            ]);
        }

        return $data_window->getClone(0, $size)->getBytes();
    }

    /**
     * Turn this entry into a string.
     *
     * @return string a string representation of this entry. This is
     *         mostly for debugging.
     */
    public function __toString()
    {
        return ExifEye::fmt("  Thumbnail   : %s\n", $this->getEntry()->toString());
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        $dump = parent::toDumpArray();
        unset($dump['id'], $dump['name']);
        return $dump;
    }
}
