<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Jpeg;

use FileEye\MediaProbe\Collection;

class SegmentCom extends Collection {

  protected static $map = array (
  'name' => 'COM',
  'title' => 'JPEG Comment',
  'payload' => 'variable',
  'class' => 'FileEye\\MediaProbe\\Block\\JpegSegmentCom',
  'DOMNode' => 'jpegSegment',
);
}
