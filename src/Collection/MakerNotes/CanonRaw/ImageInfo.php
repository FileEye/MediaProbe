<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class ImageInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonRawImageInfo',
  'title' => 'CanonRaw ImageInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageWidth',
      'title' => 'Image Width',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageHeight',
      'title' => 'Image Height',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'PixelAspectRatio',
      'title' => 'Pixel Aspect Ratio',
      'format' =>
      array (
        0 => 11,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'Rotation',
      'title' => 'Rotation',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'ComponentBitDepth',
      'title' => 'Component Bit Depth',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorBitDepth',
      'title' => 'Color Bit Depth',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorBW',
      'title' => 'Color BW',
      'format' =>
      array (
        0 => 4,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'ColorBW' => 6,
    'ColorBitDepth' => 5,
    'ComponentBitDepth' => 4,
    'ImageHeight' => 1,
    'ImageWidth' => 0,
    'PixelAspectRatio' => 2,
    'Rotation' => 3,
  ),
);
}
