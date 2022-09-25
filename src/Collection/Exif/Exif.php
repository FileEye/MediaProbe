<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Exif;

use FileEye\MediaProbe\Collection\CollectionBase;

class Exif extends CollectionBase {

  protected static $map = array (
  'title' => 'JPEG Exif data',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Exif',
  'DOMNode' => 'exif',
  'id' => 'Exif\\Exif',
  'items' =>
  array (
    'Tiff' =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tiff',
      ),
    ),
  ),
);
}
