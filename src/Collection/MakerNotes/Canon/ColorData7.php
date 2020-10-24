<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorData7 extends Collection {

  protected static $map = array (
  'name' => 'CanonColorData7',
  'title' => 'Canon Color Data7',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AverageBlackLevel' => 276,
    'ColorDataVersion' => 0,
    'ColorTempAsShot' => 67,
    'ColorTempAuto' => 72,
    'ColorTempCloudy' => 142,
    'ColorTempDaylight' => 132,
    'ColorTempFlash' => 162,
    'ColorTempFluorescent' => 152,
    'ColorTempKelvin' => 157,
    'ColorTempMeasured' => 77,
    'ColorTempShade' => 137,
    'ColorTempTungsten' => 147,
    'ColorTempUnknown' => 82,
    'ColorTempUnknown10' => 127,
    'ColorTempUnknown11' => 167,
    'ColorTempUnknown12' => 172,
    'ColorTempUnknown13' => 177,
    'ColorTempUnknown14' => 182,
    'ColorTempUnknown15' => 187,
    'ColorTempUnknown16' => 192,
    'ColorTempUnknown17' => 197,
    'ColorTempUnknown18' => 202,
    'ColorTempUnknown19' => 207,
    'ColorTempUnknown2' => 87,
    'ColorTempUnknown20' => 212,
    'ColorTempUnknown3' => 92,
    'ColorTempUnknown4' => 97,
    'ColorTempUnknown5' => 102,
    'ColorTempUnknown6' => 107,
    'ColorTempUnknown7' => 112,
    'ColorTempUnknown8' => 117,
    'ColorTempUnknown9' => 122,
    'LinearityUpperMargin' => 734,
    'NormalWhiteLevel' => 732,
    'PerChannelBlackLevel' => 728,
    'RawMeasuredRGGB' => 619,
    'SpecularWhiteLevel' => 733,
    'WB_RGGBLevelsAsShot' => 63,
    'WB_RGGBLevelsAuto' => 68,
    'WB_RGGBLevelsCloudy' => 138,
    'WB_RGGBLevelsDaylight' => 128,
    'WB_RGGBLevelsFlash' => 158,
    'WB_RGGBLevelsFluorescent' => 148,
    'WB_RGGBLevelsKelvin' => 153,
    'WB_RGGBLevelsMeasured' => 73,
    'WB_RGGBLevelsShade' => 133,
    'WB_RGGBLevelsTungsten' => 143,
    'WB_RGGBLevelsUnknown' => 78,
    'WB_RGGBLevelsUnknown10' => 123,
    'WB_RGGBLevelsUnknown11' => 163,
    'WB_RGGBLevelsUnknown12' => 168,
    'WB_RGGBLevelsUnknown13' => 173,
    'WB_RGGBLevelsUnknown14' => 178,
    'WB_RGGBLevelsUnknown15' => 183,
    'WB_RGGBLevelsUnknown16' => 188,
    'WB_RGGBLevelsUnknown17' => 193,
    'WB_RGGBLevelsUnknown18' => 198,
    'WB_RGGBLevelsUnknown19' => 203,
    'WB_RGGBLevelsUnknown2' => 83,
    'WB_RGGBLevelsUnknown20' => 208,
    'WB_RGGBLevelsUnknown3' => 88,
    'WB_RGGBLevelsUnknown4' => 93,
    'WB_RGGBLevelsUnknown5' => 98,
    'WB_RGGBLevelsUnknown6' => 103,
    'WB_RGGBLevelsUnknown7' => 108,
    'WB_RGGBLevelsUnknown8' => 113,
    'WB_RGGBLevelsUnknown9' => 118,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AverageBlackLevel' => 276,
    'Canon:ColorDataVersion' => 0,
    'Canon:ColorTempAsShot' => 67,
    'Canon:ColorTempAuto' => 72,
    'Canon:ColorTempCloudy' => 142,
    'Canon:ColorTempDaylight' => 132,
    'Canon:ColorTempFlash' => 162,
    'Canon:ColorTempFluorescent' => 152,
    'Canon:ColorTempKelvin' => 157,
    'Canon:ColorTempMeasured' => 77,
    'Canon:ColorTempShade' => 137,
    'Canon:ColorTempTungsten' => 147,
    'Canon:ColorTempUnknown' => 82,
    'Canon:ColorTempUnknown10' => 127,
    'Canon:ColorTempUnknown11' => 167,
    'Canon:ColorTempUnknown12' => 172,
    'Canon:ColorTempUnknown13' => 177,
    'Canon:ColorTempUnknown14' => 182,
    'Canon:ColorTempUnknown15' => 187,
    'Canon:ColorTempUnknown16' => 192,
    'Canon:ColorTempUnknown17' => 197,
    'Canon:ColorTempUnknown18' => 202,
    'Canon:ColorTempUnknown19' => 207,
    'Canon:ColorTempUnknown2' => 87,
    'Canon:ColorTempUnknown20' => 212,
    'Canon:ColorTempUnknown3' => 92,
    'Canon:ColorTempUnknown4' => 97,
    'Canon:ColorTempUnknown5' => 102,
    'Canon:ColorTempUnknown6' => 107,
    'Canon:ColorTempUnknown7' => 112,
    'Canon:ColorTempUnknown8' => 117,
    'Canon:ColorTempUnknown9' => 122,
    'Canon:LinearityUpperMargin' => 734,
    'Canon:NormalWhiteLevel' => 732,
    'Canon:PerChannelBlackLevel' => 728,
    'Canon:RawMeasuredRGGB' => 619,
    'Canon:SpecularWhiteLevel' => 733,
    'Canon:WB_RGGBLevelsAsShot' => 63,
    'Canon:WB_RGGBLevelsAuto' => 68,
    'Canon:WB_RGGBLevelsCloudy' => 138,
    'Canon:WB_RGGBLevelsDaylight' => 128,
    'Canon:WB_RGGBLevelsFlash' => 158,
    'Canon:WB_RGGBLevelsFluorescent' => 148,
    'Canon:WB_RGGBLevelsKelvin' => 153,
    'Canon:WB_RGGBLevelsMeasured' => 73,
    'Canon:WB_RGGBLevelsShade' => 133,
    'Canon:WB_RGGBLevelsTungsten' => 143,
    'Canon:WB_RGGBLevelsUnknown' => 78,
    'Canon:WB_RGGBLevelsUnknown10' => 123,
    'Canon:WB_RGGBLevelsUnknown11' => 163,
    'Canon:WB_RGGBLevelsUnknown12' => 168,
    'Canon:WB_RGGBLevelsUnknown13' => 173,
    'Canon:WB_RGGBLevelsUnknown14' => 178,
    'Canon:WB_RGGBLevelsUnknown15' => 183,
    'Canon:WB_RGGBLevelsUnknown16' => 188,
    'Canon:WB_RGGBLevelsUnknown17' => 193,
    'Canon:WB_RGGBLevelsUnknown18' => 198,
    'Canon:WB_RGGBLevelsUnknown19' => 203,
    'Canon:WB_RGGBLevelsUnknown2' => 83,
    'Canon:WB_RGGBLevelsUnknown20' => 208,
    'Canon:WB_RGGBLevelsUnknown3' => 88,
    'Canon:WB_RGGBLevelsUnknown4' => 93,
    'Canon:WB_RGGBLevelsUnknown5' => 98,
    'Canon:WB_RGGBLevelsUnknown6' => 103,
    'Canon:WB_RGGBLevelsUnknown7' => 108,
    'Canon:WB_RGGBLevelsUnknown8' => 113,
    'Canon:WB_RGGBLevelsUnknown9' => 118,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorDataVersion',
      'title' => 'Color Data Version',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          10 => '10 (1DX/5DmkIII/6D/70D/100D/650D/700D/M)',
          11 => '11 (7DmkII/750D/760D)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorDataVersion',
    ),
    63 =>
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
    67 =>
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
    68 =>
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
    72 =>
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
    73 =>
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
    77 =>
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
    78 =>
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
    82 =>
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
    83 =>
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
    87 =>
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
    88 =>
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
    92 =>
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
    93 =>
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
    97 =>
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
    98 =>
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
    102 =>
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
    103 =>
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
    107 =>
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
    108 =>
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
    112 =>
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
    113 =>
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
    117 =>
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
    118 =>
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
    122 =>
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
    123 =>
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
    127 =>
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
    128 =>
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
    132 =>
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
    133 =>
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
    137 =>
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
    138 =>
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
    142 =>
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
    143 =>
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
    147 =>
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
    148 =>
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
    152 =>
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
    153 =>
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
    157 =>
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
    158 =>
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
    162 =>
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
    163 =>
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
    172 =>
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
    173 =>
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
    177 =>
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
    178 =>
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
    182 =>
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
    183 =>
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
    187 =>
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
    188 =>
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
    192 =>
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
    193 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown17',
      'title' => 'WB RGGB Levels Unknown 17',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown17',
    ),
    197 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown17',
      'title' => 'Color Temp Unknown 17',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown17',
    ),
    198 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown18',
      'title' => 'WB RGGB Levels Unknown 18',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown18',
    ),
    202 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown18',
      'title' => 'Color Temp Unknown 18',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown18',
    ),
    203 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown19',
      'title' => 'WB RGGB Levels Unknown 19',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown19',
    ),
    207 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown19',
      'title' => 'Color Temp Unknown 19',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown19',
    ),
    208 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown20',
      'title' => 'WB RGGB Levels Unknown 20',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WB_RGGBLevelsUnknown20',
    ),
    212 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown20',
      'title' => 'Color Temp Unknown 20',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ColorTempUnknown20',
    ),
    276 =>
    array (
      'collection' => 'Tag',
      'name' => 'AverageBlackLevel',
      'title' => 'Average Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:AverageBlackLevel',
    ),
    429 =>
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
    504 =>
    array (
      'collection' => 'Tag',
      'name' => 'PerChannelBlackLevel',
      'title' => 'Per Channel Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:PerChannelBlackLevel',
    ),
    508 =>
    array (
      'collection' => 'Tag',
      'name' => 'NormalWhiteLevel',
      'title' => 'Normal White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:NormalWhiteLevel',
    ),
    509 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpecularWhiteLevel',
      'title' => 'Specular White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:SpecularWhiteLevel',
    ),
    510 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearityUpperMargin',
      'title' => 'Linearity Upper Margin',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:LinearityUpperMargin',
    ),
    619 =>
    array (
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
    728 =>
    array (
      'collection' => 'Tag',
      'name' => 'PerChannelBlackLevel',
      'title' => 'Per Channel Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:PerChannelBlackLevel',
    ),
    732 =>
    array (
      'collection' => 'Tag',
      'name' => 'NormalWhiteLevel',
      'title' => 'Normal White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:NormalWhiteLevel',
    ),
    733 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpecularWhiteLevel',
      'title' => 'Specular White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:SpecularWhiteLevel',
    ),
    734 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearityUpperMargin',
      'title' => 'Linearity Upper Margin',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:LinearityUpperMargin',
    ),
  ),
);
}
