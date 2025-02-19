<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class ColorInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonColorInfo',
  'title' => 'Canon ColorInfo',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Media\\Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\ColorInfo',
  'itemsByName' =>
  array (
    'ColorSpace' =>
    array (
      0 => 3,
    ),
    'ColorTone' =>
    array (
      0 => 2,
    ),
    'Saturation' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ColorSpace' =>
    array (
      0 => 3,
    ),
    'Canon:ColorTone' =>
    array (
      0 => 2,
    ),
    'Canon:Saturation' =>
    array (
      0 => 1,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'Saturation',
        'title' => 'Saturation',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Normal',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:Saturation',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ColorTone',
        'title' => 'Color Tone',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Normal',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:ColorTone',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ColorSpace',
        'title' => 'Color Space',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'sRGB',
            2 => 'Adobe RGB',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:ColorSpace',
      ),
    ),
  ),
);
}
