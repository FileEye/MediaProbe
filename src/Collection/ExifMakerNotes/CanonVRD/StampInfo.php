<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection\CollectionBase;

class StampInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVRDStampInfo',
  'title' => 'CanonVRD StampInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\CanonVRD\\StampInfo',
  'handler' => 'FileEye\\MediaProbe\\Block\\ExifMakerNotes\\CanonVRD\\StampInfo',
  'itemsByName' =>
  array (
    'StampToolCount' =>
    array (
      0 => 2,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:StampToolCount' =>
    array (
      0 => 2,
    ),
  ),
  'items' =>
  array (
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'StampToolCount',
        'title' => 'Stamp Tool Count',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonVRD:StampToolCount',
      ),
    ),
  ),
);
}
