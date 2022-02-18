<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Collection\CollectionBase;

class Format extends CollectionBase {

  protected static $map = array (
  'title' => 'The list of MediaProbe supported data formats.',
  'id' => 'Format',
  'itemsByName' =>
  array (
    'Ascii' =>
    array (
      0 => 2,
    ),
    'Byte' =>
    array (
      0 => 1,
    ),
    'Char' =>
    array (
      0 => 2000,
    ),
    'Double' =>
    array (
      0 => 12,
    ),
    'Float' =>
    array (
      0 => 11,
    ),
    'Long' =>
    array (
      0 => 4,
    ),
    'Rational' =>
    array (
      0 => 5,
    ),
    'Short' =>
    array (
      0 => 3,
    ),
    'ShortRational' =>
    array (
      0 => 1001,
    ),
    'ShortRev' =>
    array (
      0 => 1000,
    ),
    'SignedByte' =>
    array (
      0 => 6,
    ),
    'SignedLong' =>
    array (
      0 => 9,
    ),
    'SignedRational' =>
    array (
      0 => 10,
    ),
    'SignedShort' =>
    array (
      0 => 8,
    ),
    'SignedShortRational' =>
    array (
      0 => 1002,
    ),
    'Undefined' =>
    array (
      0 => 7,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'name' => 'Byte',
        'title' => 'Byte',
        'length' => 1,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Byte',
        'collection' => 'VoidCollection',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'name' => 'Ascii',
        'title' => 'Ascii',
        'length' => 1,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Ascii',
        'collection' => 'VoidCollection',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'name' => 'Short',
        'title' => 'Short',
        'length' => 2,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Short',
        'collection' => 'VoidCollection',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'name' => 'Long',
        'title' => 'Long',
        'length' => 4,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Long',
        'collection' => 'VoidCollection',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'name' => 'Rational',
        'title' => 'Rational',
        'length' => 8,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Rational',
        'collection' => 'VoidCollection',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'name' => 'SignedByte',
        'title' => 'SignedByte',
        'length' => 1,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedByte',
        'collection' => 'VoidCollection',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'name' => 'Undefined',
        'title' => 'Undefined',
        'length' => 1,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Undefined',
        'collection' => 'VoidCollection',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'name' => 'SignedShort',
        'title' => 'SignedShort',
        'length' => 2,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedShort',
        'collection' => 'VoidCollection',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'name' => 'SignedLong',
        'title' => 'SignedLong',
        'length' => 4,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedLong',
        'collection' => 'VoidCollection',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'name' => 'SignedRational',
        'title' => 'SignedRational',
        'length' => 8,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedRational',
        'collection' => 'VoidCollection',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'name' => 'Float',
        'title' => 'Float',
        'length' => 4,
        'collection' => 'VoidCollection',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'name' => 'Double',
        'title' => 'Double',
        'length' => 8,
        'collection' => 'VoidCollection',
      ),
    ),
    1000 =>
    array (
      0 =>
      array (
        'name' => 'ShortRev',
        'title' => 'ShortRev',
        'length' => 2,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\ShortRev',
        'collection' => 'VoidCollection',
      ),
    ),
    1001 =>
    array (
      0 =>
      array (
        'name' => 'ShortRational',
        'title' => 'ShortRational',
        'length' => 4,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\ShortRational',
        'collection' => 'VoidCollection',
      ),
    ),
    1002 =>
    array (
      0 =>
      array (
        'name' => 'SignedShortRational',
        'title' => 'SignedShortRational',
        'length' => 4,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedShortRational',
        'collection' => 'VoidCollection',
      ),
    ),
    2000 =>
    array (
      0 =>
      array (
        'name' => 'Char',
        'title' => 'Char',
        'length' => 1,
        'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Char',
        'collection' => 'VoidCollection',
      ),
    ),
  ),
);
}
