<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CameraInfoUnknown extends Collection {

  protected static $map = array (
  'name' => 'CanonCameraInfoUnknown',
  'title' => 'Canon CameraInfoUnknown',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\CameraInfoMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 1,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'LensSerialNumber' =>
    array (
      0 => 363,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:LensSerialNumber' =>
    array (
      0 => 363,
    ),
  ),
  'items' =>
  array (
    363 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\CameraInfo\\LensSerialNumber',
        'outputFormat' => 2,
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
  ),
);
}
