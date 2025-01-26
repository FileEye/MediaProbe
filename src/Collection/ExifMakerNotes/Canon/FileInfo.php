<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class FileInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonFileInfo',
  'title' => 'File Information',
  'handler' => 'FileEye\\MediaProbe\\Block\\Map',
  'DOMNode' => 'map',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\FileInfo',
  'itemsByName' =>
  array (
    'AntiFlicker' =>
    array (
      0 => 32,
    ),
    'BracketMode' =>
    array (
      0 => 3,
    ),
    'BracketShotNumber' =>
    array (
      0 => 5,
    ),
    'BracketValue' =>
    array (
      0 => 4,
    ),
    'FileNumber' =>
    array (
      0 => 1,
    ),
    'FilterEffect' =>
    array (
      0 => 14,
    ),
    'FlashExposureLock' =>
    array (
      0 => 25,
    ),
    'FocusDistanceLower' =>
    array (
      0 => 21,
    ),
    'FocusDistanceUpper' =>
    array (
      0 => 20,
    ),
    'LiveViewShooting' =>
    array (
      0 => 19,
    ),
    'LongExposureNoiseReduction2' =>
    array (
      0 => 8,
    ),
    'MacroMagnification' =>
    array (
      0 => 16,
    ),
    'RFLensType' =>
    array (
      0 => 61,
    ),
    'RawJpgQuality' =>
    array (
      0 => 6,
    ),
    'RawJpgSize' =>
    array (
      0 => 7,
    ),
    'ShutterCount' =>
    array (
      0 => 1,
    ),
    'ShutterMode' =>
    array (
      0 => 23,
    ),
    'ToningEffect' =>
    array (
      0 => 15,
    ),
    'WBBracketMode' =>
    array (
      0 => 9,
    ),
    'WBBracketValueAB' =>
    array (
      0 => 12,
    ),
    'WBBracketValueGM' =>
    array (
      0 => 13,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AntiFlicker' =>
    array (
      0 => 32,
    ),
    'Canon:BracketMode' =>
    array (
      0 => 3,
    ),
    'Canon:BracketShotNumber' =>
    array (
      0 => 5,
    ),
    'Canon:BracketValue' =>
    array (
      0 => 4,
    ),
    'Canon:FileNumber' =>
    array (
      0 => 1,
    ),
    'Canon:FilterEffect' =>
    array (
      0 => 14,
    ),
    'Canon:FlashExposureLock' =>
    array (
      0 => 25,
    ),
    'Canon:FocusDistanceLower' =>
    array (
      0 => 21,
    ),
    'Canon:FocusDistanceUpper' =>
    array (
      0 => 20,
    ),
    'Canon:LiveViewShooting' =>
    array (
      0 => 19,
    ),
    'Canon:LongExposureNoiseReduction2' =>
    array (
      0 => 8,
    ),
    'Canon:MacroMagnification' =>
    array (
      0 => 16,
    ),
    'Canon:RFLensType' =>
    array (
      0 => 61,
    ),
    'Canon:RawJpgQuality' =>
    array (
      0 => 6,
    ),
    'Canon:RawJpgSize' =>
    array (
      0 => 7,
    ),
    'Canon:ShutterCount' =>
    array (
      0 => 1,
    ),
    'Canon:ShutterMode' =>
    array (
      0 => 23,
    ),
    'Canon:ToningEffect' =>
    array (
      0 => 15,
    ),
    'Canon:WBBracketMode' =>
    array (
      0 => 9,
    ),
    'Canon:WBBracketValueAB' =>
    array (
      0 => 12,
    ),
    'Canon:WBBracketValueGM' =>
    array (
      0 => 13,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FileNumber',
        'collection' => 'Tiff\\Tag',
        'name' => 'FileNumber',
        'title' => 'File Number',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:FileNumber',
      ),
      1 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FileNumber',
        'collection' => 'Tiff\\Tag',
        'name' => 'FileNumber',
        'title' => 'File Number',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:FileNumber',
      ),
      2 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FileNumber',
        'collection' => 'Tiff\\Tag',
        'name' => 'ShutterCount',
        'title' => 'Shutter Count',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:ShutterCount',
      ),
      3 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FileNumber',
        'collection' => 'Tiff\\Tag',
        'name' => 'ShutterCount',
        'title' => 'Shutter Count',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:ShutterCount',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BracketMode',
        'title' => 'Bracket Mode',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'AEB',
            2 => 'FEB',
            3 => 'ISO',
            4 => 'WB',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:BracketMode',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BracketValue',
        'title' => 'Bracket Value',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:BracketValue',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BracketShotNumber',
        'title' => 'Bracket Shot Number',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:BracketShotNumber',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RawJpgQuality',
        'title' => 'Raw Jpg Quality',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'n/a',
            1 => 'Economy',
            2 => 'Normal',
            3 => 'Fine',
            4 => 'RAW',
            5 => 'Superfine',
            7 => 'CRAW',
            130 => 'Light (RAW)',
            131 => 'Standard (RAW)',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:RawJpgQuality',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RawJpgSize',
        'title' => 'Raw Jpg Size',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'n/a',
            0 => 'Large',
            1 => 'Medium',
            2 => 'Small',
            5 => 'Medium 1',
            6 => 'Medium 2',
            7 => 'Medium 3',
            8 => 'Postcard',
            9 => 'Widescreen',
            10 => 'Medium Widescreen',
            14 => 'Small 1',
            15 => 'Small 2',
            16 => 'Small 3',
            128 => '640x480 Movie',
            129 => 'Medium Movie',
            130 => 'Small Movie',
            137 => '1280x720 Movie',
            142 => '1920x1080 Movie',
            143 => '4096x2160 Movie',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:RawJpgSize',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'LongExposureNoiseReduction2',
        'title' => 'Long Exposure Noise Reduction 2',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On (1D)',
            3 => 'On',
            4 => 'Auto',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:LongExposureNoiseReduction2',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WBBracketMode',
        'title' => 'WB Bracket Mode',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On (shift AB)',
            2 => 'On (shift GM)',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:WBBracketMode',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WBBracketValueAB',
        'title' => 'WB Bracket Value AB',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WBBracketValueAB',
      ),
    ),
    13 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WBBracketValueGM',
        'title' => 'WB Bracket Value GM',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:WBBracketValueGM',
      ),
    ),
    14 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FilterEffect',
        'title' => 'Filter Effect',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'None',
            1 => 'Yellow',
            2 => 'Orange',
            3 => 'Red',
            4 => 'Green',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:FilterEffect',
      ),
    ),
    15 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ToningEffect',
        'title' => 'Toning Effect',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'None',
            1 => 'Sepia',
            2 => 'Blue',
            3 => 'Purple',
            4 => 'Green',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:ToningEffect',
      ),
    ),
    16 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'MacroMagnification',
        'title' => 'Macro Magnification',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:MacroMagnification',
      ),
    ),
    19 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'LiveViewShooting',
        'title' => 'Live View Shooting',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:LiveViewShooting',
      ),
    ),
    20 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FocusDistance',
        'collection' => 'Tiff\\Tag',
        'name' => 'FocusDistanceUpper',
        'title' => 'Focus Distance Upper',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocusDistanceUpper',
      ),
    ),
    21 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FocusDistance',
        'collection' => 'Tiff\\Tag',
        'name' => 'FocusDistanceLower',
        'title' => 'Focus Distance Lower',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocusDistanceLower',
      ),
    ),
    23 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ShutterMode',
        'title' => 'Shutter Mode',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Mechanical',
            1 => 'Electronic First Curtain',
            2 => 'Electronic',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:ShutterMode',
      ),
    ),
    25 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FlashExposureLock',
        'title' => 'Flash Exposure Lock',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:FlashExposureLock',
      ),
    ),
    32 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AntiFlicker',
        'title' => 'Anti Flicker',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:AntiFlicker',
      ),
    ),
    61 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RFLensType',
        'title' => 'RF Lens Type',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'n/a',
            257 => 'Canon RF 50mm F1.2L USM',
            258 => 'Canon RF 24-105mm F4L IS USM',
            259 => 'Canon RF 28-70mm F2L USM',
            260 => 'Canon RF 35mm F1.8 MACRO IS STM',
            261 => 'Canon RF 85mm F1.2L USM',
            262 => 'Canon RF 85mm F1.2L USM DS',
            263 => 'Canon RF 24-70mm F2.8L IS USM',
            264 => 'Canon RF 15-35mm F2.8L IS USM',
            265 => 'Canon RF 24-240mm F4-6.3 IS USM',
            266 => 'Canon RF 70-200mm F2.8L IS USM',
            267 => 'Canon RF 85mm F2 MACRO IS STM',
            268 => 'Canon RF 600mm F11 IS STM',
            269 => 'Canon RF 600mm F11 IS STM + RF1.4x',
            270 => 'Canon RF 600mm F11 IS STM + RF2x',
            271 => 'Canon RF 800mm F11 IS STM',
            272 => 'Canon RF 800mm F11 IS STM + RF1.4x',
            273 => 'Canon RF 800mm F11 IS STM + RF2x',
            274 => 'Canon RF 24-105mm F4-7.1 IS STM',
            275 => 'Canon RF 100-500mm F4.5-7.1L IS USM',
            276 => 'Canon RF 100-500mm F4.5-7.1L IS USM + RF1.4x',
            277 => 'Canon RF 100-500mm F4.5-7.1L IS USM + RF2x',
            278 => 'Canon RF 70-200mm F4L IS USM',
            279 => 'Canon RF 100mm F2.8L MACRO IS USM',
            280 => 'Canon RF 50mm F1.8 STM',
            281 => 'Canon RF 14-35mm F4L IS USM',
            282 => 'Canon RF-S 18-45mm F4.5-6.3 IS STM',
            283 => 'Canon RF 100-400mm F5.6-8 IS USM',
            284 => 'Canon RF 100-400mm F5.6-8 IS USM + RF1.4x',
            285 => 'Canon RF 100-400mm F5.6-8 IS USM + RF2x',
            286 => 'Canon RF-S 18-150mm F3.5-6.3 IS STM',
            287 => 'Canon RF 24mm F1.8 MACRO IS STM',
            288 => 'Canon RF 16mm F2.8 STM',
            289 => 'Canon RF 400mm F2.8L IS USM',
            290 => 'Canon RF 400mm F2.8L IS USM + RF1.4x',
            291 => 'Canon RF 400mm F2.8L IS USM + RF2x',
            292 => 'Canon RF 600mm F4L IS USM',
            293 => 'Canon RF 600mm F4L IS USM + RF1.4x',
            294 => 'Canon RF 600mm F4L IS USM + RF2x',
            295 => 'Canon RF 800mm F5.6L IS USM',
            296 => 'Canon RF 800mm F5.6L IS USM + RF1.4x',
            297 => 'Canon RF 800mm F5.6L IS USM + RF2x',
            298 => 'Canon RF 1200mm F8L IS USM',
            299 => 'Canon RF 1200mm F8L IS USM + RF1.4x',
            300 => 'Canon RF 1200mm F8L IS USM + RF2x',
            301 => 'Canon RF 5.2mm F2.8L Dual Fisheye 3D VR',
            302 => 'Canon RF 15-30mm F4.5-6.3 IS STM',
            303 => 'Canon RF 135mm F1.8 L IS USM',
            304 => 'Canon RF 24-50mm F4.5-6.3 IS STM',
            305 => 'Canon RF-S 55-210mm F5-7.1 IS STM',
            306 => 'Canon RF 100-300mm F2.8L IS USM',
            307 => 'Canon RF 100-300mm F2.8L IS USM + RF1.4x',
            308 => 'Canon RF 100-300mm F2.8L IS USM + RF2x',
            309 => 'Canon RF 200-800mm F6.3-9 IS USM',
            310 => 'Canon RF 200-800mm F6.3-9 IS USM + RF1.4x',
            311 => 'Canon RF 200-800mm F6.3-9 IS USM + RF2x',
            312 => 'Canon RF 10-20mm F4 L IS STM',
            313 => 'Canon RF 28mm F2.8 STM',
            314 => 'Canon RF 24-105mm F2.8 L IS USM Z',
            315 => 'Canon RF-S 10-18mm F4.5-6.3 IS STM',
            316 => 'Canon RF 35mm F1.4 L VCM',
            317 => 'Canon RF-S 3.9mm F3.5 STM DUAL FISHEYE',
            318 => 'Canon RF 28-70mm F2.8 IS STM',
            319 => 'Canon RF 70-200mm F2.8 L IS USM Z',
            325 => 'Canon RF 50mm F1.4 L VCM',
            326 => 'Canon RF 24mm F1.4 L VCM',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:RFLensType',
      ),
    ),
  ),
);
}
