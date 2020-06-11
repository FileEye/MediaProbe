<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorBalance extends Collection {

  protected static $map = array (
  'name' => 'CanonColorBalance',
  'title' => 'Canon Color Balance',
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
    'WB_RGGBBlackLevels' => 37,
    'WB_RGGBLevelsAuto' => 1,
    'WB_RGGBLevelsCloudy' => 13,
    'WB_RGGBLevelsCustom' => 29,
    'WB_RGGBLevelsDaylight' => 5,
    'WB_RGGBLevelsFlash' => 25,
    'WB_RGGBLevelsFluorescent' => 21,
    'WB_RGGBLevelsKelvin' => 33,
    'WB_RGGBLevelsShade' => 9,
    'WB_RGGBLevelsTungsten' => 17,
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
      'name' => 'WB_RGGBLevelsAuto',
      'title' => 'WB RGGB Levels Auto',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsDaylight',
      'title' => 'WB RGGB Levels Daylight',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    9 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsShade',
      'title' => 'WB RGGB Levels Shade',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsCloudy',
      'title' => 'WB RGGB Levels Cloudy',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    17 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsTungsten',
      'title' => 'WB RGGB Levels Tungsten',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    21 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsFluorescent',
      'title' => 'WB RGGB Levels Fluorescent',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    25 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsFlash',
      'title' => 'WB RGGB Levels Flash',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    29 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsCustom',
      'title' => 'WB RGGB Levels Custom',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    33 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsKelvin',
      'title' => 'WB RGGB Levels Kelvin',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    37 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBBlackLevels',
      'title' => 'WB RGGB Black Levels',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
  ),
);
}
