<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Exif;

use FileEye\MediaProbe\Collection;

class Exif extends Collection {

  protected static $map = array (
  'title' => 'JPEG Exif data',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Exif',
  'DOMNode' => 'exif',
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
