<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class CropInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonCropInfo',
  'title' => 'Canon CropInfo',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\CropInfo',
  'itemsByName' =>
  array (
    'CropBottomMargin' =>
    array (
      0 => 3,
    ),
    'CropLeftMargin' =>
    array (
      0 => 0,
    ),
    'CropRightMargin' =>
    array (
      0 => 1,
    ),
    'CropTopMargin' =>
    array (
      0 => 2,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:CropBottomMargin' =>
    array (
      0 => 3,
    ),
    'Canon:CropLeftMargin' =>
    array (
      0 => 0,
    ),
    'Canon:CropRightMargin' =>
    array (
      0 => 1,
    ),
    'Canon:CropTopMargin' =>
    array (
      0 => 2,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CropLeftMargin',
        'title' => 'Crop Left Margin',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:CropLeftMargin',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CropRightMargin',
        'title' => 'Crop Right Margin',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:CropRightMargin',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CropTopMargin',
        'title' => 'Crop Top Margin',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:CropTopMargin',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CropBottomMargin',
        'title' => 'Crop Bottom Margin',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:CropBottomMargin',
      ),
    ),
  ),
);
}
