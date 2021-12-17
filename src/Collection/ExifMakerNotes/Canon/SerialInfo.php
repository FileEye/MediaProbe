<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class SerialInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonSerialInfo',
  'title' => 'Canon SerialInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\IndexMap',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 1,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'InternalSerialNumber' =>
    array (
      0 => 9,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:InternalSerialNumber' =>
    array (
      0 => 9,
    ),
  ),
  'items' =>
  array (
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'InternalSerialNumber',
        'title' => 'Internal Serial Number',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Canon:InternalSerialNumber',
      ),
    ),
  ),
);
}