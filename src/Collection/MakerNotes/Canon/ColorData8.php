<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorData8 extends Collection {

  protected static $map = array (
  'name' => 'CanonColorData8',
  'title' => 'Canon Color Data8',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AverageBlackLevel' => 326,
    'ColorDataVersion' => 0,
    'ColorTempAsShot' => 67,
    'ColorTempAuto' => 72,
    'ColorTempCloudy' => 147,
    'ColorTempDaylight' => 137,
    'ColorTempFlash' => 167,
    'ColorTempFluorescent' => 157,
    'ColorTempKelvin' => 162,
    'ColorTempMeasured' => 77,
    'ColorTempShade' => 142,
    'ColorTempTungsten' => 152,
    'ColorTempUnknown' => 82,
    'ColorTempUnknown10' => 127,
    'ColorTempUnknown11' => 132,
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
    'ColorTempUnknown21' => 217,
    'ColorTempUnknown22' => 222,
    'ColorTempUnknown23' => 227,
    'ColorTempUnknown24' => 232,
    'ColorTempUnknown25' => 237,
    'ColorTempUnknown26' => 242,
    'ColorTempUnknown27' => 247,
    'ColorTempUnknown28' => 252,
    'ColorTempUnknown29' => 257,
    'ColorTempUnknown3' => 92,
    'ColorTempUnknown30' => 262,
    'ColorTempUnknown4' => 97,
    'ColorTempUnknown5' => 102,
    'ColorTempUnknown6' => 107,
    'ColorTempUnknown7' => 112,
    'ColorTempUnknown8' => 117,
    'ColorTempUnknown9' => 122,
    'LinearityUpperMargin' => 784,
    'NormalWhiteLevel' => 782,
    'PerChannelBlackLevel' => 778,
    'SpecularWhiteLevel' => 783,
    'WB_RGGBLevelsAsShot' => 63,
    'WB_RGGBLevelsAuto' => 68,
    'WB_RGGBLevelsCloudy' => 143,
    'WB_RGGBLevelsDaylight' => 133,
    'WB_RGGBLevelsFlash' => 163,
    'WB_RGGBLevelsFluorescent' => 153,
    'WB_RGGBLevelsKelvin' => 158,
    'WB_RGGBLevelsMeasured' => 73,
    'WB_RGGBLevelsShade' => 138,
    'WB_RGGBLevelsTungsten' => 148,
    'WB_RGGBLevelsUnknown' => 78,
    'WB_RGGBLevelsUnknown10' => 123,
    'WB_RGGBLevelsUnknown11' => 128,
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
    'WB_RGGBLevelsUnknown21' => 213,
    'WB_RGGBLevelsUnknown22' => 218,
    'WB_RGGBLevelsUnknown23' => 223,
    'WB_RGGBLevelsUnknown24' => 228,
    'WB_RGGBLevelsUnknown25' => 233,
    'WB_RGGBLevelsUnknown26' => 238,
    'WB_RGGBLevelsUnknown27' => 243,
    'WB_RGGBLevelsUnknown28' => 248,
    'WB_RGGBLevelsUnknown29' => 253,
    'WB_RGGBLevelsUnknown3' => 88,
    'WB_RGGBLevelsUnknown30' => 258,
    'WB_RGGBLevelsUnknown4' => 93,
    'WB_RGGBLevelsUnknown5' => 98,
    'WB_RGGBLevelsUnknown6' => 103,
    'WB_RGGBLevelsUnknown7' => 108,
    'WB_RGGBLevelsUnknown8' => 113,
    'WB_RGGBLevelsUnknown9' => 118,
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
          12 => '12 (5DS/5DSR)',
          13 => '13 (80D)',
          14 => '14 (1300D/2000D/4000D)',
          15 => '15 (6DmkII/77D/200D/800D)',
        ),
      ),
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
    ),
    128 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown11',
      'title' => 'WB RGGB Levels Unknown 11',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    132 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown11',
      'title' => 'Color Temp Unknown 11',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    133 =>
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
    137 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempDaylight',
      'title' => 'Color Temp Daylight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    138 =>
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
    142 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempShade',
      'title' => 'Color Temp Shade',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    143 =>
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
    147 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempCloudy',
      'title' => 'Color Temp Cloudy',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    148 =>
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
    152 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempTungsten',
      'title' => 'Color Temp Tungsten',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    153 =>
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
    157 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempFluorescent',
      'title' => 'Color Temp Fluorescent',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    158 =>
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
    162 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempKelvin',
      'title' => 'Color Temp Kelvin',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    163 =>
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
    167 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempFlash',
      'title' => 'Color Temp Flash',
      'format' =>
      array (
        0 => 8,
      ),
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
    ),
    213 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown21',
      'title' => 'WB RGGB Levels Unknown 21',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    217 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown21',
      'title' => 'Color Temp Unknown 21',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    218 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown22',
      'title' => 'WB RGGB Levels Unknown 22',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    222 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown22',
      'title' => 'Color Temp Unknown 22',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    223 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown23',
      'title' => 'WB RGGB Levels Unknown 23',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    227 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown23',
      'title' => 'Color Temp Unknown 23',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    228 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown24',
      'title' => 'WB RGGB Levels Unknown 24',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    232 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown24',
      'title' => 'Color Temp Unknown 24',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    233 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown25',
      'title' => 'WB RGGB Levels Unknown 25',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    237 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown25',
      'title' => 'Color Temp Unknown 25',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    238 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown26',
      'title' => 'WB RGGB Levels Unknown 26',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    242 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown26',
      'title' => 'Color Temp Unknown 26',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    243 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown27',
      'title' => 'WB RGGB Levels Unknown 27',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    247 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown27',
      'title' => 'Color Temp Unknown 27',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    248 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown28',
      'title' => 'WB RGGB Levels Unknown 28',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    252 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown28',
      'title' => 'Color Temp Unknown 28',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    253 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown29',
      'title' => 'WB RGGB Levels Unknown 29',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    257 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown29',
      'title' => 'Color Temp Unknown 29',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    258 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsUnknown30',
      'title' => 'WB RGGB Levels Unknown 30',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    262 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempUnknown30',
      'title' => 'Color Temp Unknown 30',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    326 =>
    array (
      'collection' => 'Tag',
      'name' => 'AverageBlackLevel',
      'title' => 'Average Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
    ),
    556 =>
    array (
      'collection' => 'Tag',
      'name' => 'PerChannelBlackLevel',
      'title' => 'Per Channel Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
    ),
    560 =>
    array (
      'collection' => 'Tag',
      'name' => 'NormalWhiteLevel',
      'title' => 'Normal White Level',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    561 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpecularWhiteLevel',
      'title' => 'Specular White Level',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    562 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearityUpperMargin',
      'title' => 'Linearity Upper Margin',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    778 =>
    array (
      'collection' => 'Tag',
      'name' => 'PerChannelBlackLevel',
      'title' => 'Per Channel Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
    ),
    782 =>
    array (
      'collection' => 'Tag',
      'name' => 'NormalWhiteLevel',
      'title' => 'Normal White Level',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    783 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpecularWhiteLevel',
      'title' => 'Specular White Level',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    784 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearityUpperMargin',
      'title' => 'Linearity Upper Margin',
      'format' =>
      array (
        0 => 3,
      ),
    ),
  ),
);
}
