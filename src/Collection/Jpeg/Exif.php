<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class Exif extends CollectionBase {

  protected static $map = array (
  'title' => 'JPEG Exif data',
  'DOMNode' => 'exif',
  'id' => 'Jpeg\\Exif',
  'handler' => 'FileEye\\MediaProbe\\Block\\Jpeg\\Exif',
  'items' =>
  array (
    'Tiff' =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff',
      ),
    ),
  ),
);
}
