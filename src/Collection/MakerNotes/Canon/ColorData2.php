<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorData2 extends Collection {

  protected static $map = array (
  'name' => 'CanonColorData2',
  'title' => 'Canon Color Data2',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ColorTempAsShot' => 38,
    'ColorTempAuto' => 28,
    'ColorTempCloudy' => 53,
    'ColorTempDaylight' => 43,
    'ColorTempFlash' => 73,
    'ColorTempFluorescent' => 63,
    'ColorTempKelvin' => 68,
    'ColorTempPC1' => 148,
    'ColorTempPC2' => 153,
    'ColorTempPC3' => 158,
    'ColorTempShade' => 48,
    'ColorTempTungsten' => 58,
    'ColorTempUnknown' => 33,
    'ColorTempUnknown10' => 118,
    'ColorTempUnknown11' => 123,
    'ColorTempUnknown12' => 128,
    'ColorTempUnknown13' => 133,
    'ColorTempUnknown14' => 138,
    'ColorTempUnknown15' => 143,
    'ColorTempUnknown16' => 163,
    'ColorTempUnknown2' => 78,
    'ColorTempUnknown3' => 83,
    'ColorTempUnknown4' => 88,
    'ColorTempUnknown5' => 93,
    'ColorTempUnknown6' => 98,
    'ColorTempUnknown7' => 103,
    'ColorTempUnknown8' => 108,
    'ColorTempUnknown9' => 113,
    'RawMeasuredRGGB' => 618,
    'WB_RGGBLevelsAsShot' => 34,
    'WB_RGGBLevelsAuto' => 24,
    'WB_RGGBLevelsCloudy' => 49,
    'WB_RGGBLevelsDaylight' => 39,
    'WB_RGGBLevelsFlash' => 69,
    'WB_RGGBLevelsFluorescent' => 59,
    'WB_RGGBLevelsKelvin' => 64,
    'WB_RGGBLevelsPC1' => 144,
    'WB_RGGBLevelsPC2' => 149,
    'WB_RGGBLevelsPC3' => 154,
    'WB_RGGBLevelsShade' => 44,
    'WB_RGGBLevelsTungsten' => 54,
    'WB_RGGBLevelsUnknown' => 29,
    'WB_RGGBLevelsUnknown10' => 114,
    'WB_RGGBLevelsUnknown11' => 119,
    'WB_RGGBLevelsUnknown12' => 124,
    'WB_RGGBLevelsUnknown13' => 129,
    'WB_RGGBLevelsUnknown14' => 134,
    'WB_RGGBLevelsUnknown15' => 139,
    'WB_RGGBLevelsUnknown16' => 159,
    'WB_RGGBLevelsUnknown2' => 74,
    'WB_RGGBLevelsUnknown3' => 79,
    'WB_RGGBLevelsUnknown4' => 84,
    'WB_RGGBLevelsUnknown5' => 89,
    'WB_RGGBLevelsUnknown6' => 94,
    'WB_RGGBLevelsUnknown7' => 99,
    'WB_RGGBLevelsUnknown8' => 104,
    'WB_RGGBLevelsUnknown9' => 109,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ColorTempAsShot' => 38,
    'Canon:ColorTempAuto' => 28,
    'Canon:ColorTempCloudy' => 53,
    'Canon:ColorTempDaylight' => 43,
    'Canon:ColorTempFlash' => 73,
    'Canon:ColorTempFluorescent' => 63,
    'Canon:ColorTempKelvin' => 68,
    'Canon:ColorTempPC1' => 148,
    'Canon:ColorTempPC2' => 153,
    'Canon:ColorTempPC3' => 158,
    'Canon:ColorTempShade' => 48,
    'Canon:ColorTempTungsten' => 58,
    'Canon:ColorTempUnknown' => 33,
    'Canon:ColorTempUnknown10' => 118,
    'Canon:ColorTempUnknown11' => 123,
    'Canon:ColorTempUnknown12' => 128,
    'Canon:ColorTempUnknown13' => 133,
    'Canon:ColorTempUnknown14' => 138,
    'Canon:ColorTempUnknown15' => 143,
    'Canon:ColorTempUnknown16' => 163,
    'Canon:ColorTempUnknown2' => 78,
    'Canon:ColorTempUnknown3' => 83,
    'Canon:ColorTempUnknown4' => 88,
    'Canon:ColorTempUnknown5' => 93,
    'Canon:ColorTempUnknown6' => 98,
    'Canon:ColorTempUnknown7' => 103,
    'Canon:ColorTempUnknown8' => 108,
    'Canon:ColorTempUnknown9' => 113,
    'Canon:RawMeasuredRGGB' => 618,
    'Canon:WB_RGGBLevelsAsShot' => 34,
    'Canon:WB_RGGBLevelsAuto' => 24,
    'Canon:WB_RGGBLevelsCloudy' => 49,
    'Canon:WB_RGGBLevelsDaylight' => 39,
    'Canon:WB_RGGBLevelsFlash' => 69,
    'Canon:WB_RGGBLevelsFluorescent' => 59,
    'Canon:WB_RGGBLevelsKelvin' => 64,
    'Canon:WB_RGGBLevelsPC1' => 144,
    'Canon:WB_RGGBLevelsPC2' => 149,
    'Canon:WB_RGGBLevelsPC3' => 154,
    'Canon:WB_RGGBLevelsShade' => 44,
    'Canon:WB_RGGBLevelsTungsten' => 54,
    'Canon:WB_RGGBLevelsUnknown' => 29,
    'Canon:WB_RGGBLevelsUnknown10' => 114,
    'Canon:WB_RGGBLevelsUnknown11' => 119,
    'Canon:WB_RGGBLevelsUnknown12' => 124,
    'Canon:WB_RGGBLevelsUnknown13' => 129,
    'Canon:WB_RGGBLevelsUnknown14' => 134,
    'Canon:WB_RGGBLevelsUnknown15' => 139,
    'Canon:WB_RGGBLevelsUnknown16' => 159,
    'Canon:WB_RGGBLevelsUnknown2' => 74,
    'Canon:WB_RGGBLevelsUnknown3' => 79,
    'Canon:WB_RGGBLevelsUnknown4' => 84,
    'Canon:WB_RGGBLevelsUnknown5' => 89,
    'Canon:WB_RGGBLevelsUnknown6' => 94,
    'Canon:WB_RGGBLevelsUnknown7' => 99,
    'Canon:WB_RGGBLevelsUnknown8' => 104,
    'Canon:WB_RGGBLevelsUnknown9' => 109,
  ),
  'items' =>
  array (
    24 =>
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
    28 =>
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
    29 =>
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
    33 =>
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
    34 =>
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
    38 =>
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
    39 =>
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
    43 =>
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
    44 =>
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
    48 =>
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
    49 =>
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
    53 =>
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
    54 =>
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
    58 =>
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
    59 =>
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
    63 =>
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
    64 =>
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
    68 =>
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
    69 =>
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
    73 =>
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
    74 =>
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
    78 =>
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
    79 =>
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
    83 =>
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
    84 =>
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
    88 =>
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
    89 =>
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
    93 =>
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
    94 =>
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
    98 =>
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
    99 =>
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
    103 =>
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
    104 =>
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
    108 =>
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
    109 =>
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
    113 =>
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
    114 =>
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
    118 =>
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
    119 =>
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
    123 =>
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
    124 =>
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
    128 =>
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
    129 =>
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
    133 =>
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
    134 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown14',
      'title' => 'WB RGGB Levels Unknown 14',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown14',
    ),
    138 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown14',
      'title' => 'Color Temp Unknown 14',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown14',
    ),
    139 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown15',
      'title' => 'WB RGGB Levels Unknown 15',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown15',
    ),
    143 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown15',
      'title' => 'Color Temp Unknown 15',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown15',
    ),
    144 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsPC1',
      'title' => 'WB RGGB Levels PC1',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsPC1',
    ),
    148 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempPC1',
      'title' => 'Color Temp PC1',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempPC1',
    ),
    149 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsPC2',
      'title' => 'WB RGGB Levels PC2',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsPC2',
    ),
    153 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempPC2',
      'title' => 'Color Temp PC2',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempPC2',
    ),
    154 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsPC3',
      'title' => 'WB RGGB Levels PC3',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsPC3',
    ),
    158 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempPC3',
      'title' => 'Color Temp PC3',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempPC3',
    ),
    159 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown16',
      'title' => 'WB RGGB Levels Unknown 16',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown16',
    ),
    163 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown16',
      'title' => 'Color Temp Unknown 16',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown16',
    ),
    618 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonRawMeasuredRGGB',
      'collection' => 'Tag',
      'name' => 'RawMeasuredRGGB',
      'title' => 'Raw Measured RGGB',
      'components' => 4,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:RawMeasuredRGGB',
    ),
  ),
);
}
