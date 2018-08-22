<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;

/**
 * Class representing a JPEG APP1 segment.
 */
class JpegSegmentApp1 extends JpegSegmentBase
{
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
    public function toDumpArray()
    {
        $dump = parent::toDumpArray();

        // xx only if not exif
        unset($dump['elements']['entry'][0]['value']);
        unset($dump['elements']['entry'][0]['clear_value']);

        return $dump;
    }
}
