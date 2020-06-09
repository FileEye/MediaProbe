<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ModifiedInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonModifiedInfo',
  'title' => 'Canon ModifiedInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ModifiedColorTemp' => 9,
    'ModifiedDigitalGain' => 11,
    'ModifiedPictureStyle' => 10,
    'ModifiedSensorBlueLevel' => 5,
    'ModifiedSensorRedLevel' => 4,
    'ModifiedSharpness' => 2,
    'ModifiedSharpnessFreq' => 3,
    'ModifiedToneCurve' => 1,
    'ModifiedWhiteBalance' => 8,
    'ModifiedWhiteBalanceBlue' => 7,
    'ModifiedWhiteBalanceRed' => 6,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifiedToneCurve',
      'title' => 'Modified Tone Curve',
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
      'name' => 'ModifiedSharpness',
      'title' => 'Modified Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifiedSharpnessFreq',
      'title' => 'Modified Sharpness Freq',
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
      'name' => 'ModifiedSensorRedLevel',
      'title' => 'Modified Sensor Red Level',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifiedSensorBlueLevel',
      'title' => 'Modified Sensor Blue Level',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifiedWhiteBalanceRed',
      'title' => 'Modified White Balance Red',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifiedWhiteBalanceBlue',
      'title' => 'Modified White Balance Blue',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifiedWhiteBalance',
      'title' => 'Modified White Balance',
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
      'name' => 'ModifiedColorTemp',
      'title' => 'Modified Color Temp',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifiedPictureStyle',
      'title' => 'Modified Picture Style',
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
      'name' => 'ModifiedDigitalGain',
      'title' => 'Modified Digital Gain',
      'format' =>
      array (
        0 => 8,
      ),
    ),
  ),
);
}
