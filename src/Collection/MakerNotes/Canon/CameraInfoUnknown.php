<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CameraInfoUnknown extends Collection {

  protected static $map = array (
  'name' => 'CanonCameraInfoUnknown',
  'title' => 'Canon CameraInfoUnknown',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\CameraInfoMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 1,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'LensSerialNumber' => 363,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:LensSerialNumber' => 363,
  ),
  'items' =>
  array (
    363 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonCILensSerialNumber',
      'collection' => 'Tag',
      'name' => 'LensSerialNumber',
      'title' => 'Lens Serial Number',
      'components' => 5,
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'Canon:LensSerialNumber',
    ),
  ),
);
}
