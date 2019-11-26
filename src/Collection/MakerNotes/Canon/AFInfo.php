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
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\AFInfoIndex',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
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
    ),
  ),
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
);
}
