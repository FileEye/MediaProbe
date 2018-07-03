<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing JPEG comments.
 */
class JpegComment extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'jpegComment';

    /**
     * Constructs a JpegComment block object.
     */
    public function __construct(JpegSegment $parent)
    {
        parent::__construct($parent);
        $this->hasSpecification = false;
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        // Set the Comments's entry.
        $entry = new Ascii($this, [$data_window->getBytes()]);
        $this->debug("Text: {text}", [
            'text' => $entry->toString(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        return $this->getElement("entry")->toBytes();
    }
}
