<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class MyColors extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonMyColors',
  'title' => 'Canon MyColors',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Media\\Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\MyColors',
  'itemsByName' =>
  array (
    'MyColorMode' =>
    array (
      0 => 2,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:MyColorMode' =>
    array (
      0 => 2,
    ),
  ),
  'items' =>
  array (
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MyColorMode',
        'title' => 'My Color Mode',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'Positive Film',
            2 => 'Light Skin Tone',
            3 => 'Dark Skin Tone',
            4 => 'Vivid Blue',
            5 => 'Vivid Green',
            6 => 'Vivid Red',
            7 => 'Color Accent',
            8 => 'Color Swap',
            9 => 'Custom',
            12 => 'Vivid',
            13 => 'Neutral',
            14 => 'Sepia',
            15 => 'B&W',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:MyColorMode',
      ),
    ),
  ),
);
}
