<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonColorInfo',
  'title' => 'Canon ColorInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
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
    ),
    2 =>
    array (
      'collection' => 'Tag',
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
    ),
    3 =>
    array (
      'collection' => 'Tag',
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
    ),
  ),
  'itemsByName' =>
  array (
    'ColorSpace' => 3,
    'ColorTone' => 2,
    'Saturation' => 1,
  ),
);
}
