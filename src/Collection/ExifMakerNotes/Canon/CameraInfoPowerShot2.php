<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class CameraInfoPowerShot2 extends CollectionBase {

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
    'CameraTemperature' =>
    array (
      0 => 153,
      1 => 159,
      2 => 164,
      3 => 168,
      4 => 261,
    ),
    'ExposureTime' =>
    array (
      0 => 7,
    ),
    'FNumber' =>
    array (
      0 => 6,
    ),
    'ISO' =>
    array (
      0 => 1,
    ),
    'Rotation' =>
    array (
      0 => 24,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:CameraTemperature' =>
    array (
      0 => 153,
      1 => 159,
      2 => 164,
      3 => 168,
      4 => 261,
    ),
    'Canon:ExposureTime' =>
    array (
      0 => 7,
    ),
    'Canon:FNumber' =>
    array (
      0 => 6,
    ),
    'Canon:ISO' =>
    array (
      0 => 1,
    ),
    'Canon:Rotation' =>
    array (
      0 => 24,
    ),
  ),
  'items' =>
  array (
    1 =>
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
    ),
    6 =>
    array (
      0 =>
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
    ),
    7 =>
    array (
      0 =>
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
    ),
    24 =>
    array (
      0 =>
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
    ),
    153 =>
    array (
      0 =>
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
    159 =>
    array (
      0 =>
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
    164 =>
    array (
      0 =>
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
    168 =>
    array (
      0 =>
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
    261 =>
    array (
      0 =>
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
  ),
);
}
