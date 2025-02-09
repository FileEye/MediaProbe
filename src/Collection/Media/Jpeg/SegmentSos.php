<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Media\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class SegmentSos extends CollectionBase {

  protected static $map = array (
  'name' => 'SOS',
  'title' => 'JPEG Start of scan',
  'payload' => 'scan',
  'DOMNode' => 'jpegSegment',
  'id' => 'Media\\Jpeg\\SegmentSos',
  'handler' => 'FileEye\\MediaProbe\\Block\\Media\\Jpeg\\SegmentSos',
);
}
