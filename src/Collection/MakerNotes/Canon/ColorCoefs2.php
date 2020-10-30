<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorCoefs2 extends Collection {

  protected static $map = array (
  'name' => 'CanonColorCoefs2',
  'title' => 'Canon ColorCoefs2',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\ColorCalibMap',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ColorTempAsShot' => 7,
    'ColorTempAuto' => 15,
    'ColorTempCloudy' => 55,
    'ColorTempDaylight' => 39,
    'ColorTempFlash' => 87,
    'ColorTempFluorescent' => 71,
    'ColorTempKelvin' => 79,
    'ColorTempMeasured' => 23,
    'ColorTempShade' => 47,
    'ColorTempTungsten' => 63,
    'ColorTempUnknown' => 31,
    'ColorTempUnknown10' => 159,
    'ColorTempUnknown11' => 167,
    'ColorTempUnknown12' => 175,
    'ColorTempUnknown13' => 183,
    'ColorTempUnknown2' => 95,
    'ColorTempUnknown3' => 103,
    'ColorTempUnknown4' => 111,
    'ColorTempUnknown5' => 119,
    'ColorTempUnknown6' => 127,
    'ColorTempUnknown7' => 135,
    'ColorTempUnknown8' => 143,
    'ColorTempUnknown9' => 151,
    'WB_RGGBLevelsAsShot' => 0,
    'WB_RGGBLevelsAuto' => 8,
    'WB_RGGBLevelsCloudy' => 48,
    'WB_RGGBLevelsDaylight' => 32,
    'WB_RGGBLevelsFlash' => 80,
    'WB_RGGBLevelsFluorescent' => 64,
    'WB_RGGBLevelsKelvin' => 72,
    'WB_RGGBLevelsMeasured' => 16,
    'WB_RGGBLevelsShade' => 40,
    'WB_RGGBLevelsTungsten' => 56,
    'WB_RGGBLevelsUnknown' => 24,
    'WB_RGGBLevelsUnknown10' => 152,
    'WB_RGGBLevelsUnknown11' => 160,
    'WB_RGGBLevelsUnknown12' => 168,
    'WB_RGGBLevelsUnknown13' => 176,
    'WB_RGGBLevelsUnknown2' => 88,
    'WB_RGGBLevelsUnknown3' => 96,
    'WB_RGGBLevelsUnknown4' => 104,
    'WB_RGGBLevelsUnknown5' => 112,
    'WB_RGGBLevelsUnknown6' => 120,
    'WB_RGGBLevelsUnknown7' => 128,
    'WB_RGGBLevelsUnknown8' => 136,
    'WB_RGGBLevelsUnknown9' => 144,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ColorTempAsShot' => 7,
    'Canon:ColorTempAuto' => 15,
    'Canon:ColorTempCloudy' => 55,
    'Canon:ColorTempDaylight' => 39,
    'Canon:ColorTempFlash' => 87,
    'Canon:ColorTempFluorescent' => 71,
    'Canon:ColorTempKelvin' => 79,
    'Canon:ColorTempMeasured' => 23,
    'Canon:ColorTempShade' => 47,
    'Canon:ColorTempTungsten' => 63,
    'Canon:ColorTempUnknown' => 31,
    'Canon:ColorTempUnknown10' => 159,
    'Canon:ColorTempUnknown11' => 167,
    'Canon:ColorTempUnknown12' => 175,
    'Canon:ColorTempUnknown13' => 183,
    'Canon:ColorTempUnknown2' => 95,
    'Canon:ColorTempUnknown3' => 103,
    'Canon:ColorTempUnknown4' => 111,
    'Canon:ColorTempUnknown5' => 119,
    'Canon:ColorTempUnknown6' => 127,
    'Canon:ColorTempUnknown7' => 135,
    'Canon:ColorTempUnknown8' => 143,
    'Canon:ColorTempUnknown9' => 151,
    'Canon:WB_RGGBLevelsAsShot' => 0,
    'Canon:WB_RGGBLevelsAuto' => 8,
    'Canon:WB_RGGBLevelsCloudy' => 48,
    'Canon:WB_RGGBLevelsDaylight' => 32,
    'Canon:WB_RGGBLevelsFlash' => 80,
    'Canon:WB_RGGBLevelsFluorescent' => 64,
    'Canon:WB_RGGBLevelsKelvin' => 72,
    'Canon:WB_RGGBLevelsMeasured' => 16,
    'Canon:WB_RGGBLevelsShade' => 40,
    'Canon:WB_RGGBLevelsTungsten' => 56,
    'Canon:WB_RGGBLevelsUnknown' => 24,
    'Canon:WB_RGGBLevelsUnknown10' => 152,
    'Canon:WB_RGGBLevelsUnknown11' => 160,
    'Canon:WB_RGGBLevelsUnknown12' => 168,
    'Canon:WB_RGGBLevelsUnknown13' => 176,
    'Canon:WB_RGGBLevelsUnknown2' => 88,
    'Canon:WB_RGGBLevelsUnknown3' => 96,
    'Canon:WB_RGGBLevelsUnknown4' => 104,
    'Canon:WB_RGGBLevelsUnknown5' => 112,
    'Canon:WB_RGGBLevelsUnknown6' => 120,
    'Canon:WB_RGGBLevelsUnknown7' => 128,
    'Canon:WB_RGGBLevelsUnknown8' => 136,
    'Canon:WB_RGGBLevelsUnknown9' => 144,
  ),
  'items' =>
  array (
    0 =>
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
    7 =>
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
    8 =>
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
    15 =>
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
    16 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsMeasured',
      'title' => 'WB RGGB Levels Measured',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsMeasured',
    ),
    23 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempMeasured',
      'title' => 'Color Temp Measured',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempMeasured',
    ),
    24 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown',
      'title' => 'WB RGGB Levels Unknown',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown',
    ),
    31 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown',
      'title' => 'Color Temp Unknown',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown',
    ),
    32 =>
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
    47 =>
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
    48 =>
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
    55 =>
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
    56 =>
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
    63 =>
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
    64 =>
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
    71 =>
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
    72 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsKelvin',
      'title' => 'WB RGGB Levels Kelvin',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsKelvin',
    ),
    79 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempKelvin',
      'title' => 'Color Temp Kelvin',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempKelvin',
    ),
    80 =>
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
    87 =>
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
    88 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown2',
      'title' => 'WB RGGB Levels Unknown 2',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown2',
    ),
    95 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown2',
      'title' => 'Color Temp Unknown 2',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown2',
    ),
    96 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown3',
      'title' => 'WB RGGB Levels Unknown 3',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown3',
    ),
    103 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown3',
      'title' => 'Color Temp Unknown 3',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown3',
    ),
    104 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown4',
      'title' => 'WB RGGB Levels Unknown 4',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown4',
    ),
    111 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown4',
      'title' => 'Color Temp Unknown 4',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown4',
    ),
    112 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown5',
      'title' => 'WB RGGB Levels Unknown 5',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown5',
    ),
    119 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown5',
      'title' => 'Color Temp Unknown 5',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown5',
    ),
    120 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown6',
      'title' => 'WB RGGB Levels Unknown 6',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown6',
    ),
    127 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown6',
      'title' => 'Color Temp Unknown 6',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown6',
    ),
    128 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown7',
      'title' => 'WB RGGB Levels Unknown 7',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown7',
    ),
    135 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown7',
      'title' => 'Color Temp Unknown 7',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown7',
    ),
    136 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown8',
      'title' => 'WB RGGB Levels Unknown 8',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown8',
    ),
    143 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown8',
      'title' => 'Color Temp Unknown 8',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown8',
    ),
    144 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown9',
      'title' => 'WB RGGB Levels Unknown 9',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown9',
    ),
    151 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown9',
      'title' => 'Color Temp Unknown 9',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown9',
    ),
    152 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown10',
      'title' => 'WB RGGB Levels Unknown 10',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown10',
    ),
    159 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown10',
      'title' => 'Color Temp Unknown 10',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown10',
    ),
    160 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown11',
      'title' => 'WB RGGB Levels Unknown 11',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown11',
    ),
    167 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown11',
      'title' => 'Color Temp Unknown 11',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown11',
    ),
    168 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown12',
      'title' => 'WB RGGB Levels Unknown 12',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown12',
    ),
    175 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown12',
      'title' => 'Color Temp Unknown 12',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown12',
    ),
    176 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown13',
      'title' => 'WB RGGB Levels Unknown 13',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown13',
    ),
    183 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown13',
      'title' => 'Color Temp Unknown 13',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown13',
    ),
  ),
);
}
