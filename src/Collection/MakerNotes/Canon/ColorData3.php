<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorData3 extends Collection {

  protected static $map = array (
  'name' => 'CanonColorData3',
  'title' => 'Canon Color Data3',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ColorDataVersion' => 0,
    'ColorTempAsShot' => 67,
    'ColorTempAuto' => 72,
    'ColorTempCloudy' => 92,
    'ColorTempCustom' => 132,
    'ColorTempDaylight' => 82,
    'ColorTempFlash' => 112,
    'ColorTempFlashData' => 586,
    'ColorTempFluorescent' => 102,
    'ColorTempKelvin' => 107,
    'ColorTempMeasured' => 77,
    'ColorTempPC1' => 117,
    'ColorTempPC2' => 122,
    'ColorTempPC3' => 127,
    'ColorTempShade' => 87,
    'ColorTempTungsten' => 97,
    'FlashBatteryLevel' => 585,
    'FlashOutput' => 584,
    'MeasuredRGGBData' => 647,
    'PerChannelBlackLevel' => 196,
    'WB_RGGBLevelsAsShot' => 63,
    'WB_RGGBLevelsAuto' => 68,
    'WB_RGGBLevelsCloudy' => 88,
    'WB_RGGBLevelsCustom' => 128,
    'WB_RGGBLevelsDaylight' => 78,
    'WB_RGGBLevelsFlash' => 108,
    'WB_RGGBLevelsFluorescent' => 98,
    'WB_RGGBLevelsKelvin' => 103,
    'WB_RGGBLevelsMeasured' => 73,
    'WB_RGGBLevelsPC1' => 113,
    'WB_RGGBLevelsPC2' => 118,
    'WB_RGGBLevelsPC3' => 123,
    'WB_RGGBLevelsShade' => 83,
    'WB_RGGBLevelsTungsten' => 93,
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
          1 => '1 (1DmkIIN/5D/30D/400D)',
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
      'name' => 'WB_RGGBLevelsDaylight',
      'title' => 'WB RGGB Levels Daylight',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    82 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempDaylight',
      'title' => 'Color Temp Daylight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    83 =>
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
    87 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempShade',
      'title' => 'Color Temp Shade',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    88 =>
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
    92 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempCloudy',
      'title' => 'Color Temp Cloudy',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    93 =>
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
    97 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempTungsten',
      'title' => 'Color Temp Tungsten',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    98 =>
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
    102 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempFluorescent',
      'title' => 'Color Temp Fluorescent',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    103 =>
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
    107 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempKelvin',
      'title' => 'Color Temp Kelvin',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    108 =>
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
    112 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempFlash',
      'title' => 'Color Temp Flash',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    113 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsPC1',
      'title' => 'WB RGGB Levels PC1',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    117 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempPC1',
      'title' => 'Color Temp PC1',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    118 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsPC2',
      'title' => 'WB RGGB Levels PC2',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    122 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempPC2',
      'title' => 'Color Temp PC2',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    123 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_RGGBLevelsPC3',
      'title' => 'WB RGGB Levels PC3',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
    ),
    127 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempPC3',
      'title' => 'Color Temp PC3',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    128 =>
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
    132 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempCustom',
      'title' => 'Color Temp Custom',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    196 =>
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
    584 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashOutput',
      'title' => 'Flash Output',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    585 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashBatteryLevel',
      'title' => 'Flash Battery Level',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    586 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTempFlashData',
      'title' => 'Color Temp Flash Data',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    647 =>
    array (
      'collection' => 'Tag',
      'name' => 'MeasuredRGGBData',
      'title' => 'Measured RGGB Data',
      'components' => 4,
      'format' =>
      array (
        0 => 4,
      ),
    ),
  ),
);
}
