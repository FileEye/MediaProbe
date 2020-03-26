<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Collection;

class Tiff extends Collection {

  protected static $map = array (
  'title' => 'TIFF image data',
  'class' => 'FileEye\\MediaProbe\\Block\\Tiff',
  'DOMNode' => 'tiff',
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Ifd\\Ifd0',
    ),
    1 =>
    array (
      'collection' => 'Ifd\\Ifd1',
    ),
  ),
);
}
