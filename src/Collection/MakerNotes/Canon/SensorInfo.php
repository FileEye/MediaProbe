<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class SensorInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonSensorInfo',
  'title' => 'Canon Sensor Info',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'BlackMaskBottomBorder' =>
    array (
      0 => 12,
    ),
    'BlackMaskLeftBorder' =>
    array (
      0 => 9,
    ),
    'BlackMaskRightBorder' =>
    array (
      0 => 11,
    ),
    'BlackMaskTopBorder' =>
    array (
      0 => 10,
    ),
    'SensorBottomBorder' =>
    array (
      0 => 8,
    ),
    'SensorHeight' =>
    array (
      0 => 2,
    ),
    'SensorLeftBorder' =>
    array (
      0 => 5,
    ),
    'SensorRightBorder' =>
    array (
      0 => 7,
    ),
    'SensorTopBorder' =>
    array (
      0 => 6,
    ),
    'SensorWidth' =>
    array (
      0 => 1,
    ),
    'indexSize' =>
    array (
      0 => 0,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'RawData',
        'name' => 'indexSize',
        'format' =>
        array (
          0 => 8,
        ),
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'SensorWidth',
        'title' => 'Sensor Width',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SensorWidth',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'SensorHeight',
        'title' => 'Sensor Height',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SensorHeight',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'SensorLeftBorder',
        'title' => 'Sensor Left Border',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SensorLeftBorder',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'SensorTopBorder',
        'title' => 'Sensor Top Border',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SensorTopBorder',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'SensorRightBorder',
        'title' => 'Sensor Right Border',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SensorRightBorder',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'SensorBottomBorder',
        'title' => 'Sensor Bottom Border',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SensorBottomBorder',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'BlackMaskLeftBorder',
        'title' => 'Black Mask Left Border',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:BlackMaskLeftBorder',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'BlackMaskTopBorder',
        'title' => 'Black Mask Top Border',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:BlackMaskTopBorder',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'BlackMaskRightBorder',
        'title' => 'Black Mask Right Border',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:BlackMaskRightBorder',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'BlackMaskBottomBorder',
        'title' => 'Black Mask Bottom Border',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:BlackMaskBottomBorder',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:BlackMaskBottomBorder' =>
    array (
      0 => 12,
    ),
    'Canon:BlackMaskLeftBorder' =>
    array (
      0 => 9,
    ),
    'Canon:BlackMaskRightBorder' =>
    array (
      0 => 11,
    ),
    'Canon:BlackMaskTopBorder' =>
    array (
      0 => 10,
    ),
    'Canon:SensorBottomBorder' =>
    array (
      0 => 8,
    ),
    'Canon:SensorHeight' =>
    array (
      0 => 2,
    ),
    'Canon:SensorLeftBorder' =>
    array (
      0 => 5,
    ),
    'Canon:SensorRightBorder' =>
    array (
      0 => 7,
    ),
    'Canon:SensorTopBorder' =>
    array (
      0 => 6,
    ),
    'Canon:SensorWidth' =>
    array (
      0 => 1,
    ),
  ),
);
}
