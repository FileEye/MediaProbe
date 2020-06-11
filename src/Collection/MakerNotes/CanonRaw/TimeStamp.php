<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class TimeStamp extends Collection {

  protected static $map = array (
  'name' => 'CanonRawTimeStamp',
  'title' => 'CanonRaw TimeStamp',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'DateTimeOriginal' => 0,
    'TimeZoneCode' => 1,
    'TimeZoneInfo' => 2,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'DateTimeOriginal',
      'title' => 'Date/Time Original',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'TimeZoneCode',
      'title' => 'Time Zone Code',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'TimeZoneInfo',
      'title' => 'Time Zone Info',
      'format' =>
      array (
        0 => 4,
      ),
    ),
  ),
);
}
