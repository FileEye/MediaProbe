<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class Processing extends Collection {

  protected static $map = array (
  'name' => 'CanonProcessing',
  'title' => 'Canon Processing',
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
    'ColorTemperature' => 9,
    'DigitalGain' => 11,
    'PictureStyle' => 10,
    'SensorBlueLevel' => 5,
    'SensorRedLevel' => 4,
    'Sharpness' => 2,
    'SharpnessFrequency' => 3,
    'ToneCurve' => 1,
    'WBShiftAB' => 12,
    'WBShiftGM' => 13,
    'WhiteBalance' => 8,
    'WhiteBalanceBlue' => 7,
    'WhiteBalanceRed' => 6,
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
      'name' => 'ToneCurve',
      'title' => 'Tone Curve',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Standard',
          1 => 'Manual',
          2 => 'Custom',
        ),
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'Sharpness',
      'title' => 'Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessFrequency',
      'title' => 'Sharpness Frequency',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'n/a',
          1 => 'Lowest',
          2 => 'Low',
          3 => 'Standard',
          4 => 'High',
          5 => 'Highest',
        ),
      ),
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'SensorRedLevel',
      'title' => 'Sensor Red Level',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'SensorBlueLevel',
      'title' => 'Sensor Blue Level',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteBalanceRed',
      'title' => 'White Balance Red',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteBalanceBlue',
      'title' => 'White Balance Blue',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteBalance',
      'title' => 'White Balance',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Auto',
          1 => 'Daylight',
          2 => 'Cloudy',
          3 => 'Tungsten',
          4 => 'Fluorescent',
          5 => 'Flash',
          6 => 'Custom',
          7 => 'Black & White',
          8 => 'Shade',
          9 => 'Manual Temperature (Kelvin)',
          10 => 'PC Set1',
          11 => 'PC Set2',
          12 => 'PC Set3',
          14 => 'Daylight Fluorescent',
          15 => 'Custom 1',
          16 => 'Custom 2',
          17 => 'Underwater',
          18 => 'Custom 3',
          19 => 'Custom 4',
          20 => 'PC Set4',
          21 => 'PC Set5',
          23 => 'Auto (ambience priority)',
        ),
      ),
    ),
    9 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTemperature',
      'title' => 'Color Temperature',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'PictureStyle',
      'title' => 'Picture Style',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'None',
          1 => 'Standard',
          2 => 'Portrait',
          3 => 'High Saturation',
          4 => 'Adobe RGB',
          5 => 'Low Saturation',
          6 => 'CM Set 1',
          7 => 'CM Set 2',
          33 => 'User Def. 1',
          34 => 'User Def. 2',
          35 => 'User Def. 3',
          65 => 'PC 1',
          66 => 'PC 2',
          67 => 'PC 3',
          129 => 'Standard',
          130 => 'Portrait',
          131 => 'Landscape',
          132 => 'Neutral',
          133 => 'Faithful',
          134 => 'Monochrome',
          135 => 'Auto',
          136 => 'Fine Detail',
          255 => 'n/a',
          65535 => 'n/a',
        ),
      ),
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'DigitalGain',
      'title' => 'Digital Gain',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBShiftAB',
      'title' => 'WB Shift AB',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBShiftGM',
      'title' => 'WB Shift GM',
      'format' =>
      array (
        0 => 8,
      ),
    ),
  ),
);
}
