<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CNTH extends Collection {

  protected static $map = array (
  '__todo' => true,
  'name' => 'CanonCNTH',
  'title' => 'Canon CNTH',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    'CNDA' =>
    array (
      'collection' => 'Tag',
      'name' => 'ThumbnailImage',
      'title' => 'Thumbnail Image',
      'format' =>
      array (
        0 => 7,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'ThumbnailImage' => 'CNDA',
  ),
);
}
