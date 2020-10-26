<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class FilterInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonFilterInfo',
  'title' => 'Canon FilterInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Ifd',
  'DOMNode' => 'ifd',
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'FisheyeFilter' => 1281,
    'GrainyBWFilter' => 257,
    'MiniatureFilter' => 1025,
    'MiniatureFilterOrientation' => 1026,
    'MiniatureFilterParameter' => 1028,
    'MiniatureFilterPosition' => 1027,
    'PaintingFilter' => 1537,
    'SoftFocusFilter' => 513,
    'ToyCameraFilter' => 769,
    'WatercolorFilter' => 1793,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:FisheyeFilter' => 1281,
    'Canon:GrainyBWFilter' => 257,
    'Canon:MiniatureFilter' => 1025,
    'Canon:MiniatureFilterOrientation' => 1026,
    'Canon:MiniatureFilterParameter' => 1028,
    'Canon:MiniatureFilterPosition' => 1027,
    'Canon:PaintingFilter' => 1537,
    'Canon:SoftFocusFilter' => 513,
    'Canon:ToyCameraFilter' => 769,
    'Canon:WatercolorFilter' => 1793,
  ),
  'items' =>
  array (
    257 =>
    array (
      'collection' => 'Tag',
      'name' => 'GrainyBWFilter',
      'title' => 'Grainy B/W Filter',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:GrainyBWFilter',
    ),
    513 =>
    array (
      'collection' => 'Tag',
      'name' => 'SoftFocusFilter',
      'title' => 'Soft Focus Filter',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SoftFocusFilter',
    ),
    769 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToyCameraFilter',
      'title' => 'Toy Camera Filter',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToyCameraFilter',
    ),
    1025 =>
    array (
      'collection' => 'Tag',
      'name' => 'MiniatureFilter',
      'title' => 'Miniature Filter',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:MiniatureFilter',
    ),
    1026 =>
    array (
      'collection' => 'Tag',
      'name' => 'MiniatureFilterOrientation',
      'title' => 'Miniature Filter Orientation',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Horizontal',
          1 => 'Vertical',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:MiniatureFilterOrientation',
    ),
    1027 =>
    array (
      'collection' => 'Tag',
      'name' => 'MiniatureFilterPosition',
      'title' => 'Miniature Filter Position',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'Canon:MiniatureFilterPosition',
    ),
    1028 =>
    array (
      'collection' => 'Tag',
      'name' => 'MiniatureFilterParameter',
      'title' => 'Miniature Filter Parameter',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'Canon:MiniatureFilterParameter',
    ),
    1281 =>
    array (
      'collection' => 'Tag',
      'name' => 'FisheyeFilter',
      'title' => 'Fisheye Filter',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FisheyeFilter',
    ),
    1537 =>
    array (
      'collection' => 'Tag',
      'name' => 'PaintingFilter',
      'title' => 'Painting Filter',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:PaintingFilter',
    ),
    1793 =>
    array (
      'collection' => 'Tag',
      'name' => 'WatercolorFilter',
      'title' => 'Watercolor Filter',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:WatercolorFilter',
    ),
  ),
);
}
