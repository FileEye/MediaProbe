<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class Panorama extends Collection {

  protected static $map = array (
  'name' => 'CanonPanorama',
  'title' => 'Panorama Information',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'RawData',
      'name' => 'indexSize',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'PanoramaFrameNumber',
      'title' => 'Panorama Frame Number',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'PanoramaDirection',
      'title' => 'Panorama Direction',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Left to Right',
          1 => 'Right to Left',
          2 => 'Bottom to Top',
          3 => 'Top to Bottom',
          4 => '2x2 Matrix (Clockwise)',
        ),
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'PanoramaDirection' => 5,
    'PanoramaFrameNumber' => 2,
    'indexSize' => 0,
  ),
);
}
