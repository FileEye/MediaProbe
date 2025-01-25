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
    'MakerNoteCanon' =>
    array (
      0 => 'CMT3',
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
    'Canon:MakerNoteCanon' =>
    array (
      0 => 'CMT3',
    ),
    'Canon:ThumbnailImage' =>
    array (
      0 => 'THMB',
    ),
  ),
  'items' =>
  array (
    'CMT3' =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'MakerNoteCanon',
        'title' => 'Maker Note Canon',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Canon:MakerNoteCanon',
      ),
    ),
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
