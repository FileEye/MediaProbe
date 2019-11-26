<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

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
  'items' =>
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
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureTime',
      'title' => 'Exposure Time',
      'format' =>
      array (
        0 => 1001,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISO',
      'title' => 'ISO',
      'format' =>
      array (
        0 => 4,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'ExposureTime' => 1,
    'FNumber' => 0,
    'ISO' => 2,
  ),
);
}
