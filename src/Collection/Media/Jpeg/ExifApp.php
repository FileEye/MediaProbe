<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Media\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class ExifApp extends CollectionBase {

  protected static $map = array (
  'title' => 'JPEG Exif data',
  'DOMNode' => 'exif',
  'id' => 'Media\\Jpeg\\ExifApp',
  'handler' => 'FileEye\\MediaProbe\\Block\\Media\\Jpeg\\ExifApp',
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
