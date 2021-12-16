<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CNTH extends Collection {

  protected static $map = array (
  '__todo' => true,
  'name' => 'CanonCNTH',
  'title' => 'Canon CNTH',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ThumbnailImage' =>
    array (
      0 => 'CNDA',
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ThumbnailImage' =>
    array (
      0 => 'CNDA',
    ),
  ),
  'items' =>
  array (
    'CNDA' =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ThumbnailImage',
        'title' => 'Thumbnail Image',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Canon:ThumbnailImage',
      ),
    ),
  ),
);
}
