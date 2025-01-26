<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class SegmentSos extends CollectionBase {

  protected static $map = array (
  'name' => 'SOS',
  'title' => 'JPEG Start of scan',
  'payload' => 'scan',
  'DOMNode' => 'jpegSegment',
  'id' => 'Jpeg\\SegmentSos',
  'handler' => 'FileEye\\MediaProbe\\Block\\Jpeg\\SegmentSos',
);
}
