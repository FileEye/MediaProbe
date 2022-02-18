<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Collection\CollectionBase;

class Media extends CollectionBase {

  protected static $map = array (
  'class' => 'FileEye\\MediaProbe\\Media',
  'DOMNode' => 'media',
  'id' => 'Media',
  'items' =>
  array (
    'Jpeg' =>
    array (
      0 =>
      array (
        'collection' => 'Jpeg\\Jpeg',
      ),
    ),
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
