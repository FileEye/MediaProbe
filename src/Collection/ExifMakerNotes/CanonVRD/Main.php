<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection\CollectionBase;

class Main extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVRDMain',
  'title' => 'CanonVRD',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\CanonVRD\\Main',
  'handler' => 'FileEye\\MediaProbe\\Block\\ExifMakerNotes\\CanonVRD\\Main',
  'itemsByName' =>
  array (
    'XMP' =>
    array (
      0 => 4294902006,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:XMP' =>
    array (
      0 => 4294902006,
    ),
  ),
  'items' =>
  array (
    4294902006 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'XMP',
        'title' => 'XMP',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'CanonVRD:XMP',
      ),
    ),
  ),
);
}
