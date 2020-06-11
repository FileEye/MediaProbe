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
    ),
  ),
);
}
