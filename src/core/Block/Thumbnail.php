<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\ExifEye;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class used to hold data for a JPEG Thumbnail.
 */
class Thumbnail extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'thumbnail';

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN)
    {
    }

    /**
     * xx
     * @param DataWindow $data_element
     *            the data from which the thumbnail will be
     *            extracted.
     */
    public static function toBlock(DataElement $data_element, Ifd $ifd)
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

            $thumbnail_block = new static('thumbnail', $ifd);
            $thumbnail_entry = new Undefined($thumbnail_block, [$thumbnail_data]);
            $thumbnail_block->debug('JPEG thumbnail found at offset {offset} of length {length}', [
                'offset' => $offset,
                'length' => $length,
            ]);
        } catch (DataException $e) {
            $ifd->error($e->getMessage());
        }
    }
}
