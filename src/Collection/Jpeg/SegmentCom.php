<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class SegmentCom extends CollectionBase {

  protected static $map = array (
  'name' => 'COM',
  'title' => 'JPEG Comment',
  'payload' => 'variable',
  'class' => 'FileEye\\MediaProbe\\Block\\Jpeg\\SegmentCom',
  'parser' => 'FileEye\\MediaProbe\\Parser\\Jpeg\\SegmentCom',
  'writer' => 'FileEye\\MediaProbe\\Writer\\Jpeg\\SegmentCom',
  'DOMNode' => 'jpegSegment',
  'id' => 'Jpeg\\SegmentCom',
);
}
