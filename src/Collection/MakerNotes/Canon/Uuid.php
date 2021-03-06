<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class Uuid extends Collection {

  protected static $map = array (
  '__todo' => true,
  'name' => 'CanonUuid',
  'title' => 'Canon Uuid',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'CompressorVersion' => 'CNCV',
    'ThumbnailImage' => 'THMB',
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:CompressorVersion' => 'CNCV',
    'Canon:ThumbnailImage' => 'THMB',
  ),
  'items' =>
  array (
    'CNCV' =>
    array (
      'collection' => 'Tag',
      'name' => 'CompressorVersion',
      'title' => 'Compressor Version',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'Canon:CompressorVersion',
    ),
    'THMB' =>
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
);
}
