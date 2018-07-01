<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing content in a JPEG file.
 *
 * A JPEG file consists of a sequence of each of which has an
 * associated {@link JpegMarker marker} and some content. This
 * class represents the content, and this basic type is just a simple
 * holder of such content, represented by a {@link DataWindow}
 * object. The {@link Exif} class is an example of more
 * specialized JPEG content.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class JpegContent extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'jpegContent';

    private $data = null;

    /**
     * Make a new piece of JPEG content.
     *
     * @param DataWindow $data
     *            the content.
     */
    public function __construct(BlockBase $parent_block, DataWindow $data)
    {
        parent::__construct($parent_block);
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
    }

    /**
     * Return the bytes of the content.
     *
     * @return string bytes representing this JPEG content. These bytes
     *         will match the bytes given to {@link __construct the
     *         constructor}.
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
// xx why this??? $this->data should never be null but this happened when
// renamed getBytes to toBytes in entry classes
        if ($this->data === null) {
            return '';
        }
        return $this->data->getBytes();
    }
}
