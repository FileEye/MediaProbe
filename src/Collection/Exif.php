<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Collection;

class Exif extends Collection {

  protected static $map = array (
  'title' => 'Exif data embedded in JPEG APP1 segment.',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif',
  'DOMNode' => 'exif',
  'items' =>
  array (
    'Tiff' =>
    array (
      'collection' => 'Tiff',
    ),
  ),
);
}
