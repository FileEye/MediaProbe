<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorDataResolver extends Collection {

  protected static $map = array (
  'name' => 'CanonColorDataResolver',
  'title' => 'Canon Color Data Map Resolver',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'itemsByName' =>
  array (
    'CanonColorData1' => 1,
    'CanonColorData2' => 2,
    'CanonColorData3' => 3,
    'CanonColorData4' => 4,
    'CanonColorData5' => 5,
    'CanonColorData6' => 6,
    'CanonColorData7' => 7,
    'CanonColorData8' => 8,
    'CanonColorData9' => 9,
    'CanonColorDataUnknown' => 0,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorDataUnknown',
      'name' => 'CanonColorDataUnknown',
    ),
    1 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData1',
      'name' => 'CanonColorData1',
      'condition' =>
      array (
        0 => 582,
      ),
    ),
    2 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData2',
      'name' => 'CanonColorData2',
      'condition' =>
      array (
        0 => 653,
      ),
    ),
    3 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData3',
      'name' => 'CanonColorData3',
      'condition' =>
      array (
        0 => 796,
      ),
    ),
    4 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData4',
      'name' => 'CanonColorData4',
      'condition' =>
      array (
        0 => 692,
        1 => 674,
        2 => 702,
        3 => 1227,
        4 => 1250,
        5 => 1251,
        6 => 1337,
        7 => 1338,
        8 => 1346,
      ),
    ),
    5 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData5',
      'name' => 'CanonColorData5',
      'condition' =>
      array (
        0 => 5120,
      ),
    ),
    6 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData6',
      'name' => 'CanonColorData6',
      'condition' =>
      array (
        0 => 1273,
        1 => 1275,
      ),
    ),
    7 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData7',
      'name' => 'CanonColorData7',
      'condition' =>
      array (
        0 => 1312,
        1 => 1313,
        2 => 1316,
        3 => 1506,
      ),
    ),
    8 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData8',
      'name' => 'CanonColorData8',
      'condition' =>
      array (
        0 => 1560,
        1 => 1592,
        2 => 1353,
        3 => 1602,
      ),
    ),
    9 =>
    array (
      'collection' => 'MakerNotes\\Canon\\ColorData9',
      'name' => 'CanonColorData9',
      'condition' =>
      array (
        0 => 1816,
        1 => 1820,
        2 => 1824,
      ),
    ),
  ),
);
}
