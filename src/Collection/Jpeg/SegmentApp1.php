<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class SegmentApp1 extends CollectionBase {

  protected static $map = array (
  'name' => 'APP1',
  'title' => 'JPEG Application segment 1',
  'payload' => 'variable',
  'class' => 'FileEye\\MediaProbe\\Block\\Jpeg\\SegmentApp1',
  'DOMNode' => 'jpegSegment',
  'id' => 'Jpeg\\SegmentApp1',
  'items' =>
  array (
    'Exif' =>
    array (
      0 =>
      array (
        'collection' => 'Jpeg\\Exif',
      ),
    ),
  ),
);
}
