<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class AspectInfo extends Collection {

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
  'items' =>
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
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'CroppedImageWidth',
      'title' => 'Cropped Image Width',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'CroppedImageHeight',
      'title' => 'Cropped Image Height',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'CroppedImageLeft',
      'title' => 'Cropped Image Left',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'CroppedImageTop',
      'title' => 'Cropped Image Top',
      'format' =>
      array (
        0 => 4,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'AspectRatio' => 0,
    'CroppedImageHeight' => 2,
    'CroppedImageLeft' => 3,
    'CroppedImageTop' => 4,
    'CroppedImageWidth' => 1,
  ),
);
}
