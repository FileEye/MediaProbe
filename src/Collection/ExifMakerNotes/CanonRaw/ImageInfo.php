<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonRaw;

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
  'itemsByName' =>
  array (
    'ColorBW' =>
    array (
      0 => 6,
    ),
    'ColorBitDepth' =>
    array (
      0 => 5,
    ),
    'ComponentBitDepth' =>
    array (
      0 => 4,
    ),
    'ImageHeight' =>
    array (
      0 => 1,
    ),
    'ImageWidth' =>
    array (
      0 => 0,
    ),
    'PixelAspectRatio' =>
    array (
      0 => 2,
    ),
    'Rotation' =>
    array (
      0 => 3,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonRaw:ColorBW' =>
    array (
      0 => 6,
    ),
    'CanonRaw:ColorBitDepth' =>
    array (
      0 => 5,
    ),
    'CanonRaw:ComponentBitDepth' =>
    array (
      0 => 4,
    ),
    'CanonRaw:ImageHeight' =>
    array (
      0 => 1,
    ),
    'CanonRaw:ImageWidth' =>
    array (
      0 => 0,
    ),
    'CanonRaw:PixelAspectRatio' =>
    array (
      0 => 2,
    ),
    'CanonRaw:Rotation' =>
    array (
      0 => 3,
    ),
  ),
  'items' =>
  array (
    0 =>
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
        'exiftoolDOMNode' => 'CanonRaw:ImageWidth',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ImageHeight',
        'title' => 'Image Height',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonRaw:ImageHeight',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'PixelAspectRatio',
        'title' => 'Pixel Aspect Ratio',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'CanonRaw:PixelAspectRatio',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'Rotation',
        'title' => 'Rotation',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonRaw:Rotation',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ComponentBitDepth',
        'title' => 'Component Bit Depth',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonRaw:ComponentBitDepth',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ColorBitDepth',
        'title' => 'Color Bit Depth',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonRaw:ColorBitDepth',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ColorBW',
        'title' => 'Color BW',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonRaw:ColorBW',
      ),
    ),
  ),
);
}
