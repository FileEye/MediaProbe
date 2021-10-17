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
    'DateTimeOriginal' =>
    array (
      0 => 0,
    ),
    'TimeZoneCode' =>
    array (
      0 => 1,
    ),
    'TimeZoneInfo' =>
    array (
      0 => 2,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonRaw:DateTimeOriginal' =>
    array (
      0 => 0,
    ),
    'CanonRaw:TimeZoneCode' =>
    array (
      0 => 1,
    ),
    'CanonRaw:TimeZoneInfo' =>
    array (
      0 => 2,
    ),
  ),
  'items' =>
  array (
    0 =>
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
        'exiftoolDOMNode' => 'CanonRaw:DateTimeOriginal',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'TimeZoneCode',
        'title' => 'Time Zone Code',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonRaw:TimeZoneCode',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'TimeZoneInfo',
        'title' => 'Time Zone Info',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonRaw:TimeZoneInfo',
      ),
    ),
  ),
);
}
