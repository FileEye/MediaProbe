<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CameraInfoPowerShot extends Collection {

  protected static $map = array (
  'name' => 'CanonCameraInfoPowerShot',
  'title' => 'Canon CameraInfoPowerShot',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\CameraInfoMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'CameraTemperature' => 145,
    'ExposureTime' => 6,
    'FNumber' => 5,
    'ISO' => 0,
    'Rotation' => 23,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:CameraTemperature' => 145,
    'Canon:ExposureTime' => 6,
    'Canon:FNumber' => 5,
    'Canon:ISO' => 0,
    'Canon:Rotation' => 23,
  ),
  'items' =>
  array (
    0 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\CameraInfo\\ISO',
      'collection' => 'Tag',
      'name' => 'ISO',
      'title' => 'ISO',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'Canon:ISO',
    ),
    5 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\CameraInfo\\FNumber',
      'collection' => 'Tag',
      'name' => 'FNumber',
      'title' => 'F Number',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'Canon:FNumber',
    ),
    6 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\CameraInfo\\ExposureTime',
      'collection' => 'Tag',
      'name' => 'ExposureTime',
      'title' => 'Exposure Time',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'Canon:ExposureTime',
    ),
    23 =>
    array (
      'collection' => 'Tag',
      'name' => 'Rotation',
      'title' => 'Rotation',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'Canon:Rotation',
    ),
    135 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\CameraInfo\\CameraTemperature',
      'collection' => 'Tag',
      'name' => 'CameraTemperature',
      'title' => 'Camera Temperature',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'Canon:CameraTemperature',
    ),
    145 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\CameraInfo\\CameraTemperature',
      'collection' => 'Tag',
      'name' => 'CameraTemperature',
      'title' => 'Camera Temperature',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'Canon:CameraTemperature',
    ),
  ),
);
}
