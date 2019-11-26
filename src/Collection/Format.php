<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Collection;

class Format extends Collection {

  protected static $map = array (
  'title' => 'The list of MediaProbe supported data formats.',
  'items' =>
  array (
    1 =>
    array (
      'name' => 'Byte',
      'title' => 'Byte',
      'length' => 1,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Byte',
      'collection' => 'VoidCollection',
    ),
    2 =>
    array (
      'name' => 'Ascii',
      'title' => 'Ascii',
      'length' => 1,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Ascii',
      'collection' => 'VoidCollection',
    ),
    3 =>
    array (
      'name' => 'Short',
      'title' => 'Short',
      'length' => 2,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Short',
      'collection' => 'VoidCollection',
    ),
    4 =>
    array (
      'name' => 'Long',
      'title' => 'Long',
      'length' => 4,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Long',
      'collection' => 'VoidCollection',
    ),
    5 =>
    array (
      'name' => 'Rational',
      'title' => 'Rational',
      'length' => 8,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Rational',
      'collection' => 'VoidCollection',
    ),
    6 =>
    array (
      'name' => 'SignedByte',
      'title' => 'SignedByte',
      'length' => 1,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedByte',
      'collection' => 'VoidCollection',
    ),
    7 =>
    array (
      'name' => 'Undefined',
      'title' => 'Undefined',
      'length' => 1,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\Undefined',
      'collection' => 'VoidCollection',
    ),
    8 =>
    array (
      'name' => 'SignedShort',
      'title' => 'SignedShort',
      'length' => 2,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedShort',
      'collection' => 'VoidCollection',
    ),
    9 =>
    array (
      'name' => 'SignedLong',
      'title' => 'SignedLong',
      'length' => 4,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedLong',
      'collection' => 'VoidCollection',
    ),
    10 =>
    array (
      'name' => 'SignedRational',
      'title' => 'SignedRational',
      'length' => 8,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedRational',
      'collection' => 'VoidCollection',
    ),
    11 =>
    array (
      'name' => 'Float',
      'title' => 'Float',
      'length' => 4,
      'collection' => 'VoidCollection',
    ),
    12 =>
    array (
      'name' => 'Double',
      'title' => 'Double',
      'length' => 8,
      'collection' => 'VoidCollection',
    ),
    1000 =>
    array (
      'name' => 'ShortRev',
      'title' => 'ShortRev',
      'length' => 2,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\ShortRev',
      'collection' => 'VoidCollection',
    ),
    1001 =>
    array (
      'name' => 'ShortRational',
      'title' => 'ShortRational',
      'length' => 4,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\ShortRational',
      'collection' => 'VoidCollection',
    ),
    1002 =>
    array (
      'name' => 'SignedShortRational',
      'title' => 'SignedShortRational',
      'length' => 4,
      'class' => 'FileEye\\MediaProbe\\Entry\\Core\\SignedShortRational',
      'collection' => 'VoidCollection',
    ),
  ),
  'itemsByName' =>
  array (
    'Ascii' => 2,
    'Byte' => 1,
    'Double' => 12,
    'Float' => 11,
    'Long' => 4,
    'Rational' => 5,
    'Short' => 3,
    'ShortRational' => 1001,
    'ShortRev' => 1000,
    'SignedByte' => 6,
    'SignedLong' => 9,
    'SignedRational' => 10,
    'SignedShort' => 8,
    'SignedShortRational' => 1002,
    'Undefined' => 7,
  ),
);
}
