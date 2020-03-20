<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection;

class CropInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonVRDCropInfo',
  'title' => 'CanonVRD CropInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropActive',
      'title' => 'Crop Active',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropRotatedOriginalWidth',
      'title' => 'Crop Rotated Original Width',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropRotatedOriginalHeight',
      'title' => 'Crop Rotated Original Height',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropX',
      'title' => 'Crop X',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropY',
      'title' => 'Crop Y',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropWidth',
      'title' => 'Crop Width',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropHeight',
      'title' => 'Crop Height',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropRotation',
      'title' => 'Crop Rotation',
      'format' =>
      array (
        0 => 12,
      ),
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropOriginalWidth',
      'title' => 'Crop Original Width',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropOriginalHeight',
      'title' => 'Crop Original Height',
      'format' =>
      array (
        0 => 9,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'CropActive' => 0,
    'CropHeight' => 6,
    'CropOriginalHeight' => 11,
    'CropOriginalWidth' => 10,
    'CropRotatedOriginalHeight' => 2,
    'CropRotatedOriginalWidth' => 1,
    'CropRotation' => 8,
    'CropWidth' => 5,
    'CropX' => 3,
    'CropY' => 4,
  ),
);
}
