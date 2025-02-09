<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Media\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class SegmentCom extends CollectionBase {

  protected static $map = array (
  'name' => 'COM',
  'title' => 'JPEG Comment',
  'payload' => 'variable',
  'DOMNode' => 'jpegSegment',
  'id' => 'Media\\Jpeg\\SegmentCom',
  'handler' => 'FileEye\\MediaProbe\\Block\\Media\\Jpeg\\SegmentCom',
);
}
