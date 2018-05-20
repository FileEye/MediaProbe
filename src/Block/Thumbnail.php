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
    protected $type = 'thumbnail';

    /**
     * Constructs a Thumbnail block object.
     */
    public function __construct(Ifd $ifd)
    {
        parent::__construct($ifd);
        $this->hasSpecification = false;
    }

    /**
     * xx
     * @param DataWindow $data_window
     *            the data from which the thumbnail will be
     *            extracted.
     */
    public static function toBlock(DataWindow $data_window, Ifd $ifd)
    {
        if (!$ifd->first("tag[@name='ThumbnailOffset']") || !$ifd->first("tag[@name='ThumbnailLength']")) {
            return;
        }

        $offset = $ifd->first("tag[@name='ThumbnailOffset']")->getEntry()->getValue();
        $length = $ifd->first("tag[@name='ThumbnailLength']")->getEntry()->getValue();

        // Load the thumbnail only if both the offset and the length are
        // available and positive.
        if ($offset <= 0 || $length <= 0) {
            $ifd->warning('Invalid JPEG thumbnail for offset {offset} and length {length}', [
                'offset' => $offset,
                'length' => $length,
            ]);
            return;
        }

        // Some images have a broken length, so we try to carefully check
        // the length before we store the thumbnail.
        if ($offset + $length > $data_window->getSize()) {
            $ifd->warning('Thumbnail length {length} bytes adjusted to {adjusted_length} bytes.', [
                'length' => $length,
                'adjusted_length' => $data_window->getSize() - $offset,
            ]);
            $length = $data_window->getSize() - $offset;
        }

        // Now set the thumbnail normally.
        try {
            $thumbnail_block = new static($ifd);
            $thumbnail_data = static::xxsetThumbnail($data_window->getClone($offset, $length));
            $thumbnail_entry = new Undefined($thumbnail_block, [$thumbnail_data]);
            $thumbnail_block->debug('JPEG thumbnail found at offset {offset} of length {length}', [
                'offset' => $offset,
                'length' => $length,
            ]);
        } catch (DataWindowWindowException $e) {
            $ifd->error($e->getMessage());
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
    protected static function xxsetThumbnail(DataWindow $data_window)
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
}
