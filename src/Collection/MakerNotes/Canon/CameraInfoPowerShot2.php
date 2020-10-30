<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CameraInfoPowerShot2 extends Collection {

  protected static $map = array (
  'name' => 'CanonCameraInfoPowerShot2',
  'title' => 'Canon CameraInfoPowerShot2',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\CameraInfoMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'CameraTemperature' => 261,
    'ExposureTime' => 7,
    'FNumber' => 6,
    'ISO' => 1,
    'Rotation' => 24,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:CameraTemperature' => 261,
    'Canon:ExposureTime' => 7,
    'Canon:FNumber' => 6,
    'Canon:ISO' => 1,
    'Canon:Rotation' => 24,
  ),
  'items' =>
  array (
    1 =>
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
    6 =>
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
    7 =>
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
    24 =>
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
    153 =>
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
    159 =>
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
    164 =>
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
    168 =>
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
    261 =>
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
