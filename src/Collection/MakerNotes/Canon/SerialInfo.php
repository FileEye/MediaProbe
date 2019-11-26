<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

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
  'items' =>
  array (
    9 =>
    array (
      'collection' => 'Tag',
      'name' => 'InternalSerialNumber',
      'title' => 'Internal Serial Number',
      'format' =>
      array (
        0 => 2,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'InternalSerialNumber' => 9,
  ),
);
}
