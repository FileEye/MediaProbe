<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class AFInfo2 extends Collection {

  protected static $map = array (
  'name' => 'CanonAFInfo2',
  'title' => 'Canon AF Info2',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\AFInfoIndex',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'hasIndexSize' => true,
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AFAreaHeights' =>
    array (
      0 => 9,
    ),
    'AFAreaMode' =>
    array (
      0 => 1,
    ),
    'AFAreaWidths' =>
    array (
      0 => 8,
    ),
    'AFAreaXPositions' =>
    array (
      0 => 10,
    ),
    'AFAreaYPositions' =>
    array (
      0 => 11,
    ),
    'AFImageHeight' =>
    array (
      0 => 7,
    ),
    'AFImageWidth' =>
    array (
      0 => 6,
    ),
    'AFPointsInFocus' =>
    array (
      0 => 12,
    ),
    'AFPointsSelected' =>
    array (
      0 => 13,
    ),
    'CanonImageHeight' =>
    array (
      0 => 5,
    ),
    'CanonImageWidth' =>
    array (
      0 => 4,
    ),
    'Canon_AFInfo2_0x000d' =>
    array (
      0 => 13,
    ),
    'NumAFPoints' =>
    array (
      0 => 2,
    ),
    'PrimaryAFPoint' =>
    array (
      0 => 14,
    ),
    'ValidAFPoints' =>
    array (
      0 => 3,
    ),
    'indexSize' =>
    array (
      0 => 0,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AFAreaHeights' =>
    array (
      0 => 9,
    ),
    'Canon:AFAreaMode' =>
    array (
      0 => 1,
    ),
    'Canon:AFAreaWidths' =>
    array (
      0 => 8,
    ),
    'Canon:AFAreaXPositions' =>
    array (
      0 => 10,
    ),
    'Canon:AFAreaYPositions' =>
    array (
      0 => 11,
    ),
    'Canon:AFImageHeight' =>
    array (
      0 => 7,
    ),
    'Canon:AFImageWidth' =>
    array (
      0 => 6,
    ),
    'Canon:AFInfoSize' =>
    array (
      0 => 0,
    ),
    'Canon:AFPointsInFocus' =>
    array (
      0 => 12,
    ),
    'Canon:AFPointsSelected' =>
    array (
      0 => 13,
    ),
    'Canon:CanonImageHeight' =>
    array (
      0 => 5,
    ),
    'Canon:CanonImageWidth' =>
    array (
      0 => 4,
    ),
    'Canon:Canon_AFInfo2_0x000d' =>
    array (
      0 => 13,
    ),
    'Canon:NumAFPoints' =>
    array (
      0 => 2,
    ),
    'Canon:PrimaryAFPoint' =>
    array (
      0 => 14,
    ),
    'Canon:ValidAFPoints' =>
    array (
      0 => 3,
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
        'title' => 'AF Info Size',
        'exiftoolDOMNode' => 'Canon:AFInfoSize',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFAreaMode',
        'title' => 'AF Area Mode',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off (Manual Focus)',
            1 => 'AF Point Expansion (surround)',
            2 => 'Single-point AF',
            4 => 'Auto',
            5 => 'Face Detect AF',
            6 => 'Face + Tracking',
            7 => 'Zone AF',
            8 => 'AF Point Expansion (4 point)',
            9 => 'Spot AF',
            10 => 'AF Point Expansion (8 point)',
            11 => 'Flexizone Multi',
            13 => 'Flexizone Single',
            14 => 'Large Zone AF',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:AFAreaMode',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'NumAFPoints',
        'title' => 'Num AF Points',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:NumAFPoints',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ValidAFPoints',
        'title' => 'Valid AF Points',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:ValidAFPoints',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CanonImageWidth',
        'title' => 'Canon Image Width',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:CanonImageWidth',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CanonImageHeight',
        'title' => 'Canon Image Height',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:CanonImageHeight',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFImageWidth',
        'title' => 'AF Image Width',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:AFImageWidth',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFImageHeight',
        'title' => 'AF Image Height',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:AFImageHeight',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFAreaWidths',
        'title' => 'AF Area Widths',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:AFAreaWidths',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFAreaHeights',
        'title' => 'AF Area Heights',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:AFAreaHeights',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFAreaXPositions',
        'title' => 'AF Area X Positions',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:AFAreaXPositions',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFAreaYPositions',
        'title' => 'AF Area Y Positions',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:AFAreaYPositions',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        '__todo' => 'add decoding',
        'collection' => 'Tag',
        'name' => 'AFPointsInFocus',
        'title' => 'AF Points In Focus',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:AFPointsInFocus',
      ),
    ),
    13 =>
    array (
      0 =>
      array (
        '__todo' => 'add decoding',
        'collection' => 'Tag',
        'name' => 'AFPointsSelected',
        'title' => 'AF Points Selected',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:AFPointsSelected',
      ),
      1 =>
      array (
        '__todo' => 'add decoding',
        'collection' => 'Tag',
        'name' => 'Canon_AFInfo2_0x000d',
        'title' => 'Canon AF Info 2 0x000d',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:Canon_AFInfo2_0x000d',
      ),
    ),
    14 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'PrimaryAFPoint',
        'title' => 'Primary AF Point',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:PrimaryAFPoint',
      ),
    ),
  ),
);
}
