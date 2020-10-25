<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class HDRInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonHDRInfo',
  'title' => 'Canon HDRInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'HDR' => 1,
    'HDREffect' => 2,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:HDR' => 1,
    'Canon:HDREffect' => 2,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'HDR',
      'title' => 'HDR',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'Auto',
          2 => 'On',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:HDR',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'HDREffect',
      'title' => 'HDR Effect',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Natural',
          1 => 'Art (standard)',
          2 => 'Art (vivid)',
          3 => 'Art (bold)',
          4 => 'Art (embossed)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:HDREffect',
    ),
  ),
);
}
