<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

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
    'Unknown_CNDB' =>
    array (
      0 => 'CNDB',
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:Unknown_CNDB' =>
    array (
      0 => 'CNDB',
    ),
  ),
  'items' =>
  array (
    'CNDB' =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'Unknown_CNDB',
        'title' => 'Unknown CNDB',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Canon:Unknown_CNDB',
      ),
    ),
  ),
);
}