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
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:FocalLength' => 1,
    'Canon:FocalPlaneXSize' => 2,
    'Canon:FocalPlaneYSize' => 3,
    'Canon:FocalType' => 0,
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
      'exiftoolDOMNode' => 'Canon:FocalType',
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
      'exiftoolDOMNode' => 'Canon:FocalLength',
    ),
    2 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonFocalPlaneSize',
      'collection' => 'Tag',
      'name' => 'FocalPlaneXSize',
      'title' => 'Focal Plane X Size',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FocalPlaneXSize',
    ),
    3 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonFocalPlaneSize',
      'collection' => 'Tag',
      'name' => 'FocalPlaneYSize',
      'title' => 'Focal Plane Y Size',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FocalPlaneYSize',
    ),
  ),
);
}
