<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorData1 extends Collection {

  protected static $map = array (
  'name' => 'CanonColorData1',
  'title' => 'Canon Color Data1',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ColorTempAsShot' => 29,
    'ColorTempAuto' => 34,
    'ColorTempCloudy' => 49,
    'ColorTempCustom1' => 69,
    'ColorTempCustom2' => 74,
    'ColorTempDaylight' => 39,
    'ColorTempFlash' => 64,
    'ColorTempFluorescent' => 59,
    'ColorTempShade' => 44,
    'ColorTempTungsten' => 54,
    'WB_RGGBLevelsAsShot' => 25,
    'WB_RGGBLevelsAuto' => 30,
    'WB_RGGBLevelsCloudy' => 45,
    'WB_RGGBLevelsCustom1' => 65,
    'WB_RGGBLevelsCustom2' => 70,
    'WB_RGGBLevelsDaylight' => 35,
    'WB_RGGBLevelsFlash' => 60,
    'WB_RGGBLevelsFluorescent' => 55,
    'WB_RGGBLevelsShade' => 40,
    'WB_RGGBLevelsTungsten' => 50,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ColorTempAsShot' => 29,
    'Canon:ColorTempAuto' => 34,
    'Canon:ColorTempCloudy' => 49,
    'Canon:ColorTempCustom1' => 69,
    'Canon:ColorTempCustom2' => 74,
    'Canon:ColorTempDaylight' => 39,
    'Canon:ColorTempFlash' => 64,
    'Canon:ColorTempFluorescent' => 59,
    'Canon:ColorTempShade' => 44,
    'Canon:ColorTempTungsten' => 54,
    'Canon:WB_RGGBLevelsAsShot' => 25,
    'Canon:WB_RGGBLevelsAuto' => 30,
    'Canon:WB_RGGBLevelsCloudy' => 45,
    'Canon:WB_RGGBLevelsCustom1' => 65,
    'Canon:WB_RGGBLevelsCustom2' => 70,
    'Canon:WB_RGGBLevelsDaylight' => 35,
    'Canon:WB_RGGBLevelsFlash' => 60,
    'Canon:WB_RGGBLevelsFluorescent' => 55,
    'Canon:WB_RGGBLevelsShade' => 40,
    'Canon:WB_RGGBLevelsTungsten' => 50,
  ),
  'items' =>
  array (
    25 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsAsShot',
      'title' => 'WB RGGB Levels As Shot',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsAsShot',
    ),
    29 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempAsShot',
      'title' => 'Color Temp As Shot',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempAsShot',
    ),
    30 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsAuto',
      'title' => 'WB RGGB Levels Auto',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsAuto',
    ),
    34 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempAuto',
      'title' => 'Color Temp Auto',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempAuto',
    ),
    35 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsDaylight',
      'title' => 'WB RGGB Levels Daylight',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsDaylight',
    ),
    39 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempDaylight',
      'title' => 'Color Temp Daylight',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempDaylight',
    ),
    40 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsShade',
      'title' => 'WB RGGB Levels Shade',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsShade',
    ),
    44 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempShade',
      'title' => 'Color Temp Shade',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempShade',
    ),
    45 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsCloudy',
      'title' => 'WB RGGB Levels Cloudy',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsCloudy',
    ),
    49 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempCloudy',
      'title' => 'Color Temp Cloudy',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempCloudy',
    ),
    50 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsTungsten',
      'title' => 'WB RGGB Levels Tungsten',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsTungsten',
    ),
    54 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempTungsten',
      'title' => 'Color Temp Tungsten',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempTungsten',
    ),
    55 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsFluorescent',
      'title' => 'WB RGGB Levels Fluorescent',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsFluorescent',
    ),
    59 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempFluorescent',
      'title' => 'Color Temp Fluorescent',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempFluorescent',
    ),
    60 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsFlash',
      'title' => 'WB RGGB Levels Flash',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsFlash',
    ),
    64 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempFlash',
      'title' => 'Color Temp Flash',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempFlash',
    ),
    65 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsCustom1',
      'title' => 'WB RGGB Levels Custom 1',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsCustom1',
    ),
    69 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempCustom1',
      'title' => 'Color Temp Custom 1',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempCustom1',
    ),
    70 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsCustom2',
      'title' => 'WB RGGB Levels Custom 2',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsCustom2',
    ),
    74 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempCustom2',
      'title' => 'Color Temp Custom 2',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempCustom2',
    ),
  ),
);
}
