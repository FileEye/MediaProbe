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
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
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

        $offset = $ifd->first("tag[@name='ThumbnailOffset']/entry")->getValue();
        $length = $ifd->first("tag[@name='ThumbnailLength']/entry")->getValue();

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
            $dataxx = $data_window->getClone($offset, $length);
            $size = $dataxx->getSize();
            // Now move backwards until we find the EOI JPEG marker.
            while ($dataxx->getByte($size - 2) != 0xFF || $dataxx->getByte($size - 1) != JpegMarker::EOI) {
                $size --;
            }
            if ($size != $dataxx->getSize()) {
                $ifd->warning('Decrementing thumbnail size to {size} bytes', [
                    'size' => $size,
                ]);
            }
            $thumbnail_data = $dataxx->getClone(0, $size)->getBytes();

            $thumbnail_block = new static($ifd);
            $thumbnail_entry = new Undefined($thumbnail_block, [$thumbnail_data]);
            $thumbnail_block->debug('JPEG thumbnail found at offset {offset} of length {length}', [
                'offset' => $offset,
                'length' => $length,
            ]);
        } catch (DataWindowWindowException $e) {
            $ifd->error($e->getMessage());
        }
    }
}
