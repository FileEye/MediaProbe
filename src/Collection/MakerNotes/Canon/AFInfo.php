<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

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
    'AFAreaHeight' => 7,
    'AFAreaWidth' => 6,
    'AFAreaXPositions' => 8,
    'AFAreaYPositions' => 9,
    'AFImageHeight' => 5,
    'AFImageWidth' => 4,
    'AFPointsInFocus' => 10,
    'CanonImageHeight' => 3,
    'CanonImageWidth' => 2,
    'NumAFPoints' => 0,
    'PrimaryAFPoint' => 12,
    'ValidAFPoints' => 1,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AFAreaHeight' => 7,
    'Canon:AFAreaWidth' => 6,
    'Canon:AFAreaXPositions' => 8,
    'Canon:AFAreaYPositions' => 9,
    'Canon:AFImageHeight' => 5,
    'Canon:AFImageWidth' => 4,
    'Canon:AFPointsInFocus' => 10,
    'Canon:CanonImageHeight' => 3,
    'Canon:CanonImageWidth' => 2,
    'Canon:NumAFPoints' => 0,
    'Canon:PrimaryAFPoint' => 12,
    'Canon:ValidAFPoints' => 1,
  ),
  'items' =>
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
    1 =>
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
    2 =>
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
    3 =>
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
    4 =>
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
    5 =>
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
    6 =>
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
    7 =>
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
    8 =>
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
    9 =>
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
    10 =>
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
    11 =>
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
    12 =>
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
);
}
