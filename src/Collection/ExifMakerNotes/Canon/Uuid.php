<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class Uuid extends CollectionBase {

  protected static $map = array (
  '__todo' => true,
  'name' => 'CanonUuid',
  'title' => 'Canon Uuid',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\Uuid',
  'itemsByName' =>
  array (
    'CompressorVersion' =>
    array (
      0 => 'CNCV',
    ),
    'ThumbnailImage' =>
    array (
      0 => 'THMB',
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:CompressorVersion' =>
    array (
      0 => 'CNCV',
    ),
    'Canon:ThumbnailImage' =>
    array (
      0 => 'THMB',
    ),
  ),
  'items' =>
  array (
    'CNCV' =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CompressorVersion',
        'title' => 'Compressor Version',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Canon:CompressorVersion',
      ),
    ),
    'THMB' =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
