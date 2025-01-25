<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class CameraInfoUnknown extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonCameraInfoUnknown',
  'title' => 'Canon CameraInfoUnknown',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\CameraInfoMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 1,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\CameraInfoUnknown',
  'itemsByName' =>
  array (
    'FirmwareVersion' =>
    array (
      0 => 1473,
    ),
    'LensSerialNumber' =>
    array (
      0 => 363,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:FirmwareVersion' =>
    array (
      0 => 1473,
    ),
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
        'collection' => 'Tiff\\Tag',
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
    1473 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FirmwareVersion',
        'title' => 'Firmware Version',
        'components' => 6,
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Canon:FirmwareVersion',
      ),
    ),
  ),
);
}
