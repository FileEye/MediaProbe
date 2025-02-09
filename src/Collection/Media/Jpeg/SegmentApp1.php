<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Media\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class SegmentApp1 extends CollectionBase {

  protected static $map = array (
  'name' => 'APP1',
  'title' => 'JPEG Application segment 1',
  'payload' => 'variable',
  'DOMNode' => 'jpegSegment',
  'id' => 'Media\\Jpeg\\SegmentApp1',
  'handler' => 'FileEye\\MediaProbe\\Block\\Media\\Jpeg\\SegmentApp1',
  'items' =>
  array (
    'ExifApp' =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\ExifApp',
      ),
    ),
  ),
);
}
