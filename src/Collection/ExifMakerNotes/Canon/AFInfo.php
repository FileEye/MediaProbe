<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class AFInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonAFInfo',
  'title' => 'Canon AF Info',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\AFInfoIndex',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AFAreaHeight' =>
    array (
      0 => 7,
    ),
    'AFAreaWidth' =>
    array (
      0 => 6,
    ),
    'AFAreaXPositions' =>
    array (
      0 => 8,
    ),
    'AFAreaYPositions' =>
    array (
      0 => 9,
    ),
    'AFImageHeight' =>
    array (
      0 => 5,
    ),
    'AFImageWidth' =>
    array (
      0 => 4,
    ),
    'AFPointsInFocus' =>
    array (
      0 => 10,
    ),
    'CanonImageHeight' =>
    array (
      0 => 3,
    ),
    'CanonImageWidth' =>
    array (
      0 => 2,
    ),
    'Canon_AFInfo_0x000b' =>
    array (
      0 => 11,
    ),
    'NumAFPoints' =>
    array (
      0 => 0,
    ),
    'PrimaryAFPoint' =>
    array (
      0 => 11,
      1 => 12,
    ),
    'ValidAFPoints' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AFAreaHeight' =>
    array (
      0 => 7,
    ),
    'Canon:AFAreaWidth' =>
    array (
      0 => 6,
    ),
    'Canon:AFAreaXPositions' =>
    array (
      0 => 8,
    ),
    'Canon:AFAreaYPositions' =>
    array (
      0 => 9,
    ),
    'Canon:AFImageHeight' =>
    array (
      0 => 5,
    ),
    'Canon:AFImageWidth' =>
    array (
      0 => 4,
    ),
    'Canon:AFPointsInFocus' =>
    array (
      0 => 10,
    ),
    'Canon:CanonImageHeight' =>
    array (
      0 => 3,
    ),
    'Canon:CanonImageWidth' =>
    array (
      0 => 2,
    ),
    'Canon:Canon_AFInfo_0x000b' =>
    array (
      0 => 11,
    ),
    'Canon:NumAFPoints' =>
    array (
      0 => 0,
    ),
    'Canon:PrimaryAFPoint' =>
    array (
      0 => 11,
      1 => 12,
    ),
    'Canon:ValidAFPoints' =>
    array (
      0 => 1,
    ),
  ),
  'items' =>
  array (
    0 =>
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
    1 =>
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
    2 =>
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
    3 =>
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
    4 =>
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
    5 =>
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
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFAreaWidth',
        'title' => 'AF Area Width',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:AFAreaWidth',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFAreaHeight',
        'title' => 'AF Area Height',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:AFAreaHeight',
      ),
    ),
    8 =>
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
    9 =>
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
    10 =>
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
    11 =>
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
      1 =>
      array (
        'collection' => 'Tag',
        'name' => 'Canon_AFInfo_0x000b',
        'title' => 'Canon AF Info 0x000b',
        'components' => 8,
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:Canon_AFInfo_0x000b',
      ),
    ),
    12 =>
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
