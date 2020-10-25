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
    'BlackMaskBottomBorder' => 12,
    'BlackMaskLeftBorder' => 9,
    'BlackMaskRightBorder' => 11,
    'BlackMaskTopBorder' => 10,
    'SensorBottomBorder' => 8,
    'SensorHeight' => 2,
    'SensorLeftBorder' => 5,
    'SensorRightBorder' => 7,
    'SensorTopBorder' => 6,
    'SensorWidth' => 1,
    'indexSize' => 0,
  ),
  'items' =>
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
    1 =>
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
    2 =>
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
    5 =>
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
    6 =>
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
    7 =>
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
    8 =>
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
    9 =>
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
    10 =>
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
    11 =>
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
    12 =>
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
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:BlackMaskBottomBorder' => 12,
    'Canon:BlackMaskLeftBorder' => 9,
    'Canon:BlackMaskRightBorder' => 11,
    'Canon:BlackMaskTopBorder' => 10,
    'Canon:SensorBottomBorder' => 8,
    'Canon:SensorHeight' => 2,
    'Canon:SensorLeftBorder' => 5,
    'Canon:SensorRightBorder' => 7,
    'Canon:SensorTopBorder' => 6,
    'Canon:SensorWidth' => 1,
  ),
);
}
