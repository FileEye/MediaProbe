<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class FileInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonFileInfo',
  'title' => 'File Information',
  'class' => 'FileEye\\MediaProbe\\Block\\Map',
  'DOMNode' => 'map',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'BracketMode' => 3,
    'BracketShotNumber' => 5,
    'BracketValue' => 4,
    'FileNumber' => 1,
    'FilterEffect' => 14,
    'FlashExposureLock' => 25,
    'FocusDistanceLower' => 21,
    'FocusDistanceUpper' => 20,
    'LiveViewShooting' => 19,
    'LongExposureNoiseReduction2' => 8,
    'MacroMagnification' => 16,
    'RawJpgQuality' => 6,
    'RawJpgSize' => 7,
    'ToningEffect' => 15,
    'WBBracketMode' => 9,
    'WBBracketValueAB' => 12,
    'WBBracketValueGM' => 13,
    'indexSize' => 0,
    2 => 2,
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
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonFileNumber',
      'collection' => 'Tag',
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
      'collection' => 'RawData',
      'name' => 2,
      'title' => '0x0002',
      'format' =>
      array (
        0 => 8,
      ),
      'skip' => true,
    ),
    3 =>
    array (
      'collection' => 'Tag',
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
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'BracketValue',
      'title' => 'Bracket Value',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:BracketValue',
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'BracketShotNumber',
      'title' => 'Bracket Shot Number',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:BracketShotNumber',
    ),
    6 =>
    array (
      'collection' => 'Tag',
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
          130 => 'Normal Movie',
          131 => 'Movie (2)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:RawJpgQuality',
    ),
    7 =>
    array (
      'collection' => 'Tag',
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
    8 =>
    array (
      'collection' => 'Tag',
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
    9 =>
    array (
      'collection' => 'Tag',
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
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBBracketValueAB',
      'title' => 'WB Bracket Value AB',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WBBracketValueAB',
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBBracketValueGM',
      'title' => 'WB Bracket Value GM',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:WBBracketValueGM',
    ),
    14 =>
    array (
      'collection' => 'Tag',
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
    15 =>
    array (
      'collection' => 'Tag',
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
    16 =>
    array (
      'collection' => 'Tag',
      'name' => 'MacroMagnification',
      'title' => 'Macro Magnification',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:MacroMagnification',
    ),
    19 =>
    array (
      'collection' => 'Tag',
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
    20 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonFocusDistance',
      'collection' => 'Tag',
      'name' => 'FocusDistanceUpper',
      'title' => 'Focus Distance Upper',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FocusDistanceUpper',
    ),
    21 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonFocusDistance',
      'collection' => 'Tag',
      'name' => 'FocusDistanceLower',
      'title' => 'Focus Distance Lower',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FocusDistanceLower',
    ),
    25 =>
    array (
      'collection' => 'Tag',
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
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:BracketMode' => 3,
    'Canon:BracketShotNumber' => 5,
    'Canon:BracketValue' => 4,
    'Canon:FileNumber' => 1,
    'Canon:FilterEffect' => 14,
    'Canon:FlashExposureLock' => 25,
    'Canon:FocusDistanceLower' => 21,
    'Canon:FocusDistanceUpper' => 20,
    'Canon:LiveViewShooting' => 19,
    'Canon:LongExposureNoiseReduction2' => 8,
    'Canon:MacroMagnification' => 16,
    'Canon:RawJpgQuality' => 6,
    'Canon:RawJpgSize' => 7,
    'Canon:ToningEffect' => 15,
    'Canon:WBBracketMode' => 9,
    'Canon:WBBracketValueAB' => 12,
    'Canon:WBBracketValueGM' => 13,
  ),
);
}
