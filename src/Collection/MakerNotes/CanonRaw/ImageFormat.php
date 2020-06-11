<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class ImageFormat extends Collection {

  protected static $map = array (
  'name' => 'CanonRawImageFormat',
  'title' => 'CanonRaw ImageFormat',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'FileFormat' => 0,
    'TargetCompressionRatio' => 1,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'FileFormat',
      'title' => 'File Format',
      'format' =>
      array (
        0 => 4,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          65536 => 'JPEG (lossy)',
          65538 => 'JPEG (non-quantization)',
          65539 => 'JPEG (lossy/non-quantization toggled)',
          131073 => 'CRW',
        ),
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'TargetCompressionRatio',
      'title' => 'Target Compression Ratio',
      'format' =>
      array (
        0 => 11,
      ),
    ),
  ),
);
}
