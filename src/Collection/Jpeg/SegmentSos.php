<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Jpeg;

use FileEye\MediaProbe\Collection;

class SegmentSos extends Collection {

  protected static $map = array (
  'name' => 'SOS',
  'title' => 'JPEG Start of scan',
  'payload' => 'scan',
  'class' => 'FileEye\\MediaProbe\\Block\\JpegSegmentSos',
  'DOMNode' => 'jpegSegment',
);
}
