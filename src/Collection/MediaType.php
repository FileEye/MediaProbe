<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Collection\CollectionBase;

class MediaType extends CollectionBase {

  protected static $map = array (
  'title' => 'MediaProbe supported MIME types',
  'id' => 'MediaType',
  'handler' => 'FileEye\\MediaProbe\\Block\\MediaType',
  'items' =>
  array (
    'image/jpeg' =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg',
      ),
    ),
    'image/tiff' =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff',
      ),
    ),
  ),
);
}
