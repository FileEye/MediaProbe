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
  'itemsByName' =>
  array (
    'CropBottomMargin' => 3,
    'CropLeftMargin' => 0,
    'CropRightMargin' => 1,
    'CropTopMargin' => 2,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:CropBottomMargin' => 3,
    'Canon:CropLeftMargin' => 0,
    'Canon:CropRightMargin' => 1,
    'Canon:CropTopMargin' => 2,
  ),
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
      'exiftoolDOMNode' => 'Canon:CropLeftMargin',
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
      'exiftoolDOMNode' => 'Canon:CropRightMargin',
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
      'exiftoolDOMNode' => 'Canon:CropTopMargin',
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
      'exiftoolDOMNode' => 'Canon:CropBottomMargin',
    ),
  ),
);
}
