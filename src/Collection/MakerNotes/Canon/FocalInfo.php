<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class FocalInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonFocalInfo',
  'title' => 'Canon FocalInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Ifd',
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
      'name' => 'FocalLength',
      'title' => 'Focal Length',
      'format' =>
      array (
        0 => 1001,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'FocalLength' => 0,
  ),
);
}
