<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class FilterInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonFilterInfo',
  'title' => 'Canon FilterInfo',
  'handler' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\FilterInfoIndex',
  'DOMNode' => 'filterInfo',
  'defaultItemCollection' => 'Media\\Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\FilterInfo',
  'itemsByName' =>
  array (
    'FisheyeFilter' =>
    array (
      0 => 1281,
    ),
    'GrainyBWFilter' =>
    array (
      0 => 257,
    ),
    'MiniatureFilter' =>
    array (
      0 => 1025,
    ),
    'MiniatureFilterOrientation' =>
    array (
      0 => 1026,
    ),
    'MiniatureFilterParameter' =>
    array (
      0 => 1028,
    ),
    'MiniatureFilterPosition' =>
    array (
      0 => 1027,
    ),
    'PaintingFilter' =>
    array (
      0 => 1537,
    ),
    'SoftFocusFilter' =>
    array (
      0 => 513,
    ),
    'ToyCameraFilter' =>
    array (
      0 => 769,
    ),
    'WatercolorFilter' =>
    array (
      0 => 1793,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:FisheyeFilter' =>
    array (
      0 => 1281,
    ),
    'Canon:GrainyBWFilter' =>
    array (
      0 => 257,
    ),
    'Canon:MiniatureFilter' =>
    array (
      0 => 1025,
    ),
    'Canon:MiniatureFilterOrientation' =>
    array (
      0 => 1026,
    ),
    'Canon:MiniatureFilterParameter' =>
    array (
      0 => 1028,
    ),
    'Canon:MiniatureFilterPosition' =>
    array (
      0 => 1027,
    ),
    'Canon:PaintingFilter' =>
    array (
      0 => 1537,
    ),
    'Canon:SoftFocusFilter' =>
    array (
      0 => 513,
    ),
    'Canon:ToyCameraFilter' =>
    array (
      0 => 769,
    ),
    'Canon:WatercolorFilter' =>
    array (
      0 => 1793,
    ),
  ),
  'items' =>
  array (
    257 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'GrainyBWFilter',
        'title' => 'Grainy B/W Filter',
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'Off',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:GrainyBWFilter',
      ),
    ),
    513 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SoftFocusFilter',
        'title' => 'Soft Focus Filter',
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'Off',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:SoftFocusFilter',
      ),
    ),
    769 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ToyCameraFilter',
        'title' => 'Toy Camera Filter',
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'Off',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:ToyCameraFilter',
      ),
    ),
    1025 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MiniatureFilter',
        'title' => 'Miniature Filter',
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'Off',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:MiniatureFilter',
      ),
    ),
    1026 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MiniatureFilterOrientation',
        'title' => 'Miniature Filter Orientation',
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
    ),
    1027 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MiniatureFilterPosition',
        'title' => 'Miniature Filter Position',
        'exiftoolDOMNode' => 'Canon:MiniatureFilterPosition',
      ),
    ),
    1028 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MiniatureFilterParameter',
        'title' => 'Miniature Filter Parameter',
        'exiftoolDOMNode' => 'Canon:MiniatureFilterParameter',
      ),
    ),
    1281 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FisheyeFilter',
        'title' => 'Fisheye Filter',
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'Off',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:FisheyeFilter',
      ),
    ),
    1537 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'PaintingFilter',
        'title' => 'Painting Filter',
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'Off',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:PaintingFilter',
      ),
    ),
    1793 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 9,
        ),
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'WatercolorFilter',
        'title' => 'Watercolor Filter',
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
  ),
);
}
