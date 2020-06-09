<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class FocalLength extends Collection {

  protected static $map = array (
  'name' => 'CanonFocalLength',
  'title' => 'Canon Focal Length',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'FocalLength' => 1,
    'FocalPlaneXSize' => 2,
    'FocalPlaneYSize' => 3,
    'FocalType' => 0,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalType',
      'title' => 'Focal Type',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Fixed',
          2 => 'Zoom',
        ),
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalLength',
      'title' => 'Focal Length',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalPlaneXSize',
      'title' => 'Focal Plane X Size',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalPlaneYSize',
      'title' => 'Focal Plane Y Size',
      'format' =>
      array (
        0 => 3,
      ),
    ),
  ),
);
}
