<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class Processing extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonProcessing',
  'title' => 'Canon Processing',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\Processing',
  'itemsByName' =>
  array (
    'ColorTemperature' =>
    array (
      0 => 9,
    ),
    'DigitalGain' =>
    array (
      0 => 11,
    ),
    'PictureStyle' =>
    array (
      0 => 10,
    ),
    'SensorBlueLevel' =>
    array (
      0 => 5,
    ),
    'SensorRedLevel' =>
    array (
      0 => 4,
    ),
    'Sharpness' =>
    array (
      0 => 2,
    ),
    'SharpnessFrequency' =>
    array (
      0 => 3,
    ),
    'ToneCurve' =>
    array (
      0 => 1,
    ),
    'UnsharpMaskFineness' =>
    array (
      0 => 14,
    ),
    'UnsharpMaskThreshold' =>
    array (
      0 => 15,
    ),
    'WBShiftAB' =>
    array (
      0 => 12,
    ),
    'WBShiftGM' =>
    array (
      0 => 13,
    ),
    'WhiteBalance' =>
    array (
      0 => 8,
    ),
    'WhiteBalanceBlue' =>
    array (
      0 => 7,
    ),
    'WhiteBalanceRed' =>
    array (
      0 => 6,
    ),
    'indexSize' =>
    array (
      0 => 0,
    ),
  ),
  'items' =>
  array (
    0 =>
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
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'Canon:ToneCurve',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'Sharpness',
        'title' => 'Sharpness',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:Sharpness',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'Canon:SharpnessFrequency',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'SensorRedLevel',
        'title' => 'Sensor Red Level',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SensorRedLevel',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'SensorBlueLevel',
        'title' => 'Sensor Blue Level',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SensorBlueLevel',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WhiteBalanceRed',
        'title' => 'White Balance Red',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WhiteBalanceRed',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WhiteBalanceBlue',
        'title' => 'White Balance Blue',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WhiteBalanceBlue',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ProcessingWhiteBalance',
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'Canon:WhiteBalance',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ColorTemperature',
        'title' => 'Color Temperature',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:ColorTemperature',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'Canon:PictureStyle',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DigitalGain',
        'title' => 'Digital Gain',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:DigitalGain',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WBShiftAB',
        'title' => 'WB Shift AB',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WBShiftAB',
      ),
    ),
    13 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WBShiftGM',
        'title' => 'WB Shift GM',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WBShiftGM',
      ),
    ),
    14 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'UnsharpMaskFineness',
        'title' => 'Unsharp Mask Fineness',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:UnsharpMaskFineness',
      ),
    ),
    15 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'UnsharpMaskThreshold',
        'title' => 'Unsharp Mask Threshold',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:UnsharpMaskThreshold',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ColorTemperature' =>
    array (
      0 => 9,
    ),
    'Canon:DigitalGain' =>
    array (
      0 => 11,
    ),
    'Canon:PictureStyle' =>
    array (
      0 => 10,
    ),
    'Canon:SensorBlueLevel' =>
    array (
      0 => 5,
    ),
    'Canon:SensorRedLevel' =>
    array (
      0 => 4,
    ),
    'Canon:Sharpness' =>
    array (
      0 => 2,
    ),
    'Canon:SharpnessFrequency' =>
    array (
      0 => 3,
    ),
    'Canon:ToneCurve' =>
    array (
      0 => 1,
    ),
    'Canon:UnsharpMaskFineness' =>
    array (
      0 => 14,
    ),
    'Canon:UnsharpMaskThreshold' =>
    array (
      0 => 15,
    ),
    'Canon:WBShiftAB' =>
    array (
      0 => 12,
    ),
    'Canon:WBShiftGM' =>
    array (
      0 => 13,
    ),
    'Canon:WhiteBalance' =>
    array (
      0 => 8,
    ),
    'Canon:WhiteBalanceBlue' =>
    array (
      0 => 7,
    ),
    'Canon:WhiteBalanceRed' =>
    array (
      0 => 6,
    ),
  ),
);
}
