<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class ColorBalance extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonColorBalance',
  'title' => 'Canon Color Balance',
  'class' => 'FileEye\\MediaProbe\\Block\\Map',
  'DOMNode' => 'map',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\ColorBalance',
  'itemsByName' =>
  array (
    'WB_RGGBBlackLevels' =>
    array (
      0 => 37,
    ),
    'WB_RGGBLevelsAuto' =>
    array (
      0 => 1,
    ),
    'WB_RGGBLevelsCloudy' =>
    array (
      0 => 13,
    ),
    'WB_RGGBLevelsCustom' =>
    array (
      0 => 29,
    ),
    'WB_RGGBLevelsDaylight' =>
    array (
      0 => 5,
    ),
    'WB_RGGBLevelsFlash' =>
    array (
      0 => 25,
    ),
    'WB_RGGBLevelsFluorescent' =>
    array (
      0 => 21,
    ),
    'WB_RGGBLevelsKelvin' =>
    array (
      0 => 33,
    ),
    'WB_RGGBLevelsShade' =>
    array (
      0 => 9,
    ),
    'WB_RGGBLevelsTungsten' =>
    array (
      0 => 17,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:WB_RGGBBlackLevels' =>
    array (
      0 => 37,
    ),
    'Canon:WB_RGGBLevelsAuto' =>
    array (
      0 => 1,
    ),
    'Canon:WB_RGGBLevelsCloudy' =>
    array (
      0 => 13,
    ),
    'Canon:WB_RGGBLevelsCustom' =>
    array (
      0 => 29,
    ),
    'Canon:WB_RGGBLevelsDaylight' =>
    array (
      0 => 5,
    ),
    'Canon:WB_RGGBLevelsFlash' =>
    array (
      0 => 25,
    ),
    'Canon:WB_RGGBLevelsFluorescent' =>
    array (
      0 => 21,
    ),
    'Canon:WB_RGGBLevelsKelvin' =>
    array (
      0 => 33,
    ),
    'Canon:WB_RGGBLevelsShade' =>
    array (
      0 => 9,
    ),
    'Canon:WB_RGGBLevelsTungsten' =>
    array (
      0 => 17,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsAuto',
        'title' => 'WB RGGB Levels Auto',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsAuto',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsDaylight',
        'title' => 'WB RGGB Levels Daylight',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsDaylight',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsShade',
        'title' => 'WB RGGB Levels Shade',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsShade',
      ),
    ),
    13 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsCloudy',
        'title' => 'WB RGGB Levels Cloudy',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsCloudy',
      ),
    ),
    17 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsTungsten',
        'title' => 'WB RGGB Levels Tungsten',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsTungsten',
      ),
    ),
    21 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsFluorescent',
        'title' => 'WB RGGB Levels Fluorescent',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsFluorescent',
      ),
    ),
    25 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsFlash',
        'title' => 'WB RGGB Levels Flash',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsFlash',
      ),
    ),
    29 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsCustom',
        'title' => 'WB RGGB Levels Custom',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsCustom',
      ),
    ),
    33 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBLevelsKelvin',
        'title' => 'WB RGGB Levels Kelvin',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsKelvin',
      ),
    ),
    37 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WB_RGGBBlackLevels',
        'title' => 'WB RGGB Black Levels',
        'components' => 4,
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WB_RGGBBlackLevels',
      ),
    ),
  ),
);
}
