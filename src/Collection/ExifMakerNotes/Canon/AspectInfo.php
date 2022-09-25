<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class AspectInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonAspectInfo',
  'title' => 'Canon AspectInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'id' => 'ExifMakerNotes\\Canon\\AspectInfo',
  'itemsByName' =>
  array (
    'AspectRatio' =>
    array (
      0 => 0,
    ),
    'CroppedImageHeight' =>
    array (
      0 => 2,
    ),
    'CroppedImageLeft' =>
    array (
      0 => 3,
    ),
    'CroppedImageTop' =>
    array (
      0 => 4,
    ),
    'CroppedImageWidth' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AspectRatio' =>
    array (
      0 => 0,
    ),
    'Canon:CroppedImageHeight' =>
    array (
      0 => 2,
    ),
    'Canon:CroppedImageLeft' =>
    array (
      0 => 3,
    ),
    'Canon:CroppedImageTop' =>
    array (
      0 => 4,
    ),
    'Canon:CroppedImageWidth' =>
    array (
      0 => 1,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AspectRatio',
        'title' => 'Aspect Ratio',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => '3:2',
            1 => '1:1',
            2 => '4:3',
            7 => '16:9',
            8 => '4:5',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:AspectRatio',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CroppedImageWidth',
        'title' => 'Cropped Image Width',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:CroppedImageWidth',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CroppedImageHeight',
        'title' => 'Cropped Image Height',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:CroppedImageHeight',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CroppedImageLeft',
        'title' => 'Cropped Image Left',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:CroppedImageLeft',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CroppedImageTop',
        'title' => 'Cropped Image Top',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:CroppedImageTop',
      ),
    ),
  ),
);
}
