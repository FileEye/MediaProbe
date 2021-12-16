<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ExposureInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonExposureInfo',
  'title' => 'Canon ExposureInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ExposureTime' =>
    array (
      0 => 1,
    ),
    'FNumber' =>
    array (
      0 => 0,
    ),
    'ISO' =>
    array (
      0 => 2,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ExposureTime' =>
    array (
      0 => 1,
    ),
    'Canon:FNumber' =>
    array (
      0 => 0,
    ),
    'Canon:ISO' =>
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
        'name' => 'FNumber',
        'title' => 'F Number',
        'format' =>
        array (
          0 => 1001,
        ),
        'exiftoolDOMNode' => 'Canon:FNumber',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ExposureTime',
        'title' => 'Exposure Time',
        'format' =>
        array (
          0 => 1001,
        ),
        'exiftoolDOMNode' => 'Canon:ExposureTime',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ISO',
        'title' => 'ISO',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:ISO',
      ),
    ),
  ),
);
}
