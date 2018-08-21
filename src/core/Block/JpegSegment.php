<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\JpegMarker;
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
    protected $type = 'jpegSegment';

    /**
     * Construct a new JPEG segment object.
     */
    public function __construct($id, Jpeg $jpeg, JpegSegment $reference = null)
    {
        parent::__construct($jpeg, $reference);
        $this->setAttribute('id', $id);
        $name = JpegMarker::getName($id);
        $this->setAttribute('name', $name);
        $this->debug('{name} segment - {desc}', ['name' => $name, 'desc' => JpegMarker::getDescription($id)]);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        $this->debug("START... Loading");

        if (Exif::isExifSegment($data_window)) {
            $exif = new Exif($this);
            $ret = $exif->loadFromData($data_window, $offset);
        } else {
            $this->debug('Exif header not found.');
            $ret = false;
        }

        $this->debug(".....END Loading");

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        $bytes = '';
        foreach ($this->getMultipleElements("*") as $sub) {
            $bytes .= $sub->toBytes();
        }
        return $bytes;
    }
}
