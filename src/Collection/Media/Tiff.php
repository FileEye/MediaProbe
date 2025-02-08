<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Media;

use FileEye\MediaProbe\Collection\CollectionBase;

class Tiff extends CollectionBase {

  protected static $map = array (
  'mimeType' => 'image/tiff',
  'DOMNode' => 'tiff',
  'id' => 'Media\\Tiff',
  'handler' => 'FileEye\\MediaProbe\\Block\\Media\\Tiff',
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Ifd0',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Ifd1',
      ),
    ),
  ),
);
}
