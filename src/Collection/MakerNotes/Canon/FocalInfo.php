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
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Ifd',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'FocalLength' =>
    array (
      0 => 0,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:FocalLength' =>
    array (
      0 => 0,
    ),
  ),
  'items' =>
  array (
    0 =>
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
        'exiftoolDOMNode' => 'Canon:FocalLength',
      ),
    ),
  ),
);
}
