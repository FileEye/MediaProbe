<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class TimeInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonTimeInfo',
  'title' => 'Canon TimeInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'DaylightSavings' => 3,
    'TimeZone' => 1,
    'TimeZoneCity' => 2,
    'indexSize' => 0,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'RawData',
      'name' => 'indexSize',
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'TimeZone',
      'title' => 'Time Zone',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'Canon:TimeZone',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'TimeZoneCity',
      'title' => 'Time Zone City',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'n/a',
          1 => 'Chatham Islands',
          2 => 'Wellington',
          3 => 'Solomon Islands',
          4 => 'Sydney',
          5 => 'Adelaide',
          6 => 'Tokyo',
          7 => 'Hong Kong',
          8 => 'Bangkok',
          9 => 'Yangon',
          10 => 'Dhaka',
          11 => 'Kathmandu',
          12 => 'Delhi',
          13 => 'Karachi',
          14 => 'Kabul',
          15 => 'Dubai',
          16 => 'Tehran',
          17 => 'Moscow',
          18 => 'Cairo',
          19 => 'Paris',
          20 => 'London',
          21 => 'Azores',
          22 => 'Fernando de Noronha',
          23 => 'Sao Paulo',
          24 => 'Newfoundland',
          25 => 'Santiago',
          26 => 'Caracas',
          27 => 'New York',
          28 => 'Chicago',
          29 => 'Denver',
          30 => 'Los Angeles',
          31 => 'Anchorage',
          32 => 'Honolulu',
          33 => 'Samoa',
          32766 => '(not set)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:TimeZoneCity',
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'DaylightSavings',
      'title' => 'Daylight Savings',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          60 => 'On',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:DaylightSavings',
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:DaylightSavings' => 3,
    'Canon:TimeZone' => 1,
    'Canon:TimeZoneCity' => 2,
  ),
);
}
