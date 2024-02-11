<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Jpeg;

use FileEye\MediaProbe\Collection\CollectionBase;

class Segment extends CollectionBase {

  protected static $map = array (
  'title' => 'Generic JPEG data segment',
  'class' => 'FileEye\\MediaProbe\\Block\\Jpeg\\Segment',
  'parser' => 'FileEye\\MediaProbe\\Parser\\Jpeg\\Segment',
  'writer' => 'FileEye\\MediaProbe\\Writer\\Jpeg\\Segment',
  'DOMNode' => 'jpegSegment',
  'id' => 'Jpeg\\Segment',
);
}
