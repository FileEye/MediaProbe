<?php

namespace ExifEye\core\Block;

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
 * Class representing a JPEG data segment.
 */
class JpegSegment extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'segment';

    /**
     * Construct a new JPEG segment object.
     */
    public function __construct($name, BlockBase $parent_block = null)
    {
        parent::__construct($parent_block);

        $this->setAttribute('name', $name);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        $this->debug("START... Loading");

        $exif = new Exif($this);
        $ret = $exif->loadFromData($data_window, $offset);

        $this->debug(".....END Loading");

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($offset, $order)
    {
        return 'xxx';
    }
}
