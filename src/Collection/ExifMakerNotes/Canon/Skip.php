<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class Skip extends CollectionBase {

  protected static $map = array (
  '__todo' => true,
  'name' => 'CanonSkip',
  'title' => 'Canon Skip',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\Skip',
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
        'collection' => 'Tiff\\Tag',
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
