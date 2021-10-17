<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Jpeg;

use FileEye\MediaProbe\Collection;

class SegmentApp1 extends Collection {

  protected static $map = array (
  'name' => 'APP1',
  'title' => 'JPEG Application segment 1',
  'payload' => 'variable',
  'class' => 'FileEye\\MediaProbe\\Block\\JpegSegmentApp1',
  'DOMNode' => 'jpegSegment',
  'items' =>
  array (
    'Exif' =>
    array (
      0 =>
      array (
        'collection' => 'Exif',
      ),
    ),
  ),
);
}
