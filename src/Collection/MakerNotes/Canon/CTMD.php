<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CTMD extends Collection {

  protected static $map = array (
  '__todo' => true,
  'name' => 'CanonCTMD',
  'title' => 'Canon CTMD',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'TimeStamp' => 1,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'TimeStamp',
      'title' => 'Time Stamp',
      'format' =>
      array (
        0 => 7,
      ),
    ),
  ),
);
}
