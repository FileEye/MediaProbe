<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class Flags extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonFlags',
  'title' => 'Canon Flags',
  'handler' => 'FileEye\\MediaProbe\\Block\\Media\\Tiff\\Ifd',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Media\\Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\Flags',
  'itemsByName' =>
  array (
    'ModifiedParamFlag' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ModifiedParamFlag' =>
    array (
      0 => 1,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ModifiedParamFlag',
        'title' => 'Modified Param Flag',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:ModifiedParamFlag',
      ),
    ),
  ),
);
}
