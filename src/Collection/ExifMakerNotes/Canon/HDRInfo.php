<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class HDRInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonHDRInfo',
  'title' => 'Canon HDRInfo',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\HDRInfo',
  'itemsByName' =>
  array (
    'HDR' =>
    array (
      0 => 1,
    ),
    'HDREffect' =>
    array (
      0 => 2,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:HDR' =>
    array (
      0 => 1,
    ),
    'Canon:HDREffect' =>
    array (
      0 => 2,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
  ),
);
}
