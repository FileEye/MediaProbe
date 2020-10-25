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
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\AFInfoIndex',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'hasIndexSize' => true,
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AFAreaHeights' => 9,
    'AFAreaMode' => 1,
    'AFAreaWidths' => 8,
    'AFAreaXPositions' => 10,
    'AFAreaYPositions' => 11,
    'AFImageHeight' => 7,
    'AFImageWidth' => 6,
    'AFPointsInFocus' => 12,
    'AFPointsSelected' => 13,
    'CanonImageHeight' => 5,
    'CanonImageWidth' => 4,
    'NumAFPoints' => 2,
    'PrimaryAFPoint' => 14,
    'ValidAFPoints' => 3,
    'indexSize' => 0,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AFAreaHeights' => 9,
    'Canon:AFAreaMode' => 1,
    'Canon:AFAreaWidths' => 8,
    'Canon:AFAreaXPositions' => 10,
    'Canon:AFAreaYPositions' => 11,
    'Canon:AFImageHeight' => 7,
    'Canon:AFImageWidth' => 6,
    'Canon:AFInfoSize' => 0,
    'Canon:AFPointsInFocus' => 12,
    'Canon:AFPointsSelected' => 13,
    'Canon:CanonImageHeight' => 5,
    'Canon:CanonImageWidth' => 4,
    'Canon:NumAFPoints' => 2,
    'Canon:PrimaryAFPoint' => 14,
    'Canon:ValidAFPoints' => 3,
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
      'title' => 'AF Info Size',
      'exiftoolDOMNode' => 'Canon:AFInfoSize',
    ),
    1 =>
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
    2 =>
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
    3 =>
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
    4 =>
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
    5 =>
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
    6 =>
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
    7 =>
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
    8 =>
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
    9 =>
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
    10 =>
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
    11 =>
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
    12 =>
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
    13 =>
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
    14 =>
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
