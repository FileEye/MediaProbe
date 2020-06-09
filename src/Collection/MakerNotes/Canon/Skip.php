<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class Skip extends Collection {

  protected static $map = array (
  '__todo' => true,
  'name' => 'CanonSkip',
  'title' => 'Canon Skip',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'Unknown_CNDB' => 'CNDB',
  ),
  'items' =>
  array (
    'CNDB' =>
    array (
      'collection' => 'Tag',
      'name' => 'Unknown_CNDB',
      'title' => 'Unknown CNDB',
      'format' =>
      array (
        0 => 7,
      ),
    ),
  ),
);
}
