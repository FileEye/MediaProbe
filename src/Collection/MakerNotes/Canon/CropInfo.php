<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CropInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonCropInfo',
  'title' => 'Canon CropInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
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
      'name' => 'CropLeftMargin',
      'title' => 'Crop Left Margin',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropRightMargin',
      'title' => 'Crop Right Margin',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropTopMargin',
      'title' => 'Crop Top Margin',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropBottomMargin',
      'title' => 'Crop Bottom Margin',
      'format' =>
      array (
        0 => 3,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'CropBottomMargin' => 3,
    'CropLeftMargin' => 0,
    'CropRightMargin' => 1,
    'CropTopMargin' => 2,
  ),
);
}
