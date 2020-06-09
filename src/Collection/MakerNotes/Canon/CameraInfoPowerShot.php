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
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\CameraInfoMap',
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
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISO',
      'title' => 'ISO',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'FNumber',
      'title' => 'F Number',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureTime',
      'title' => 'Exposure Time',
      'format' =>
      array (
        0 => 9,
      ),
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
    ),
    135 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraTemperature',
      'title' => 'Camera Temperature',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    145 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraTemperature',
      'title' => 'Camera Temperature',
      'format' =>
      array (
        0 => 9,
      ),
    ),
  ),
);
}
