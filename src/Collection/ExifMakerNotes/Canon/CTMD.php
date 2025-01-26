<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class CTMD extends CollectionBase {

  protected static $map = array (
  '__todo' => true,
  'name' => 'CanonCTMD',
  'title' => 'Canon CTMD',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\CTMD',
  'itemsByName' =>
  array (
    'TimeStamp' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:TimeStamp' =>
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
        'collection' => 'Tiff\\Tag',
        'name' => 'TimeStamp',
        'title' => 'Time Stamp',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Canon:TimeStamp',
      ),
    ),
  ),
);
}
