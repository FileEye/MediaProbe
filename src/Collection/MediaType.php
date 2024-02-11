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
  'id' => 'MediaType',
  'items' =>
  array (
    'image/jpeg' =>
    array (
      0 =>
      array (
        'collection' => 'Jpeg\\Jpeg',
      ),
    ),
    'image/tiff' =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tiff',
      ),
    ),
  ),
);
}
