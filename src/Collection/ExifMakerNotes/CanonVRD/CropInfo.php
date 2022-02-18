<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection\CollectionBase;

class CropInfo extends CollectionBase {

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
  'itemsByName' =>
  array (
    'CropActive' =>
    array (
      0 => 0,
    ),
    'CropHeight' =>
    array (
      0 => 6,
    ),
    'CropOriginalHeight' =>
    array (
      0 => 11,
    ),
    'CropOriginalWidth' =>
    array (
      0 => 10,
    ),
    'CropRotatedOriginalHeight' =>
    array (
      0 => 2,
    ),
    'CropRotatedOriginalWidth' =>
    array (
      0 => 1,
    ),
    'CropRotation' =>
    array (
      0 => 8,
    ),
    'CropWidth' =>
    array (
      0 => 5,
    ),
    'CropX' =>
    array (
      0 => 3,
    ),
    'CropY' =>
    array (
      0 => 4,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:CropActive' =>
    array (
      0 => 0,
    ),
    'CanonVRD:CropHeight' =>
    array (
      0 => 6,
    ),
    'CanonVRD:CropOriginalHeight' =>
    array (
      0 => 11,
    ),
    'CanonVRD:CropOriginalWidth' =>
    array (
      0 => 10,
    ),
    'CanonVRD:CropRotatedOriginalHeight' =>
    array (
      0 => 2,
    ),
    'CanonVRD:CropRotatedOriginalWidth' =>
    array (
      0 => 1,
    ),
    'CanonVRD:CropRotation' =>
    array (
      0 => 8,
    ),
    'CanonVRD:CropWidth' =>
    array (
      0 => 5,
    ),
    'CanonVRD:CropX' =>
    array (
      0 => 3,
    ),
    'CanonVRD:CropY' =>
    array (
      0 => 4,
    ),
  ),
  'items' =>
  array (
    0 =>
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
        'exiftoolDOMNode' => 'CanonVRD:CropActive',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropRotatedOriginalWidth',
        'title' => 'Crop Rotated Original Width',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropRotatedOriginalWidth',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropRotatedOriginalHeight',
        'title' => 'Crop Rotated Original Height',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropRotatedOriginalHeight',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropX',
        'title' => 'Crop X',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropX',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropY',
        'title' => 'Crop Y',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropY',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropWidth',
        'title' => 'Crop Width',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropWidth',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropHeight',
        'title' => 'Crop Height',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropHeight',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropRotation',
        'title' => 'Crop Rotation',
        'format' =>
        array (
          0 => 12,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropRotation',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropOriginalWidth',
        'title' => 'Crop Original Width',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropOriginalWidth',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CropOriginalHeight',
        'title' => 'Crop Original Height',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CropOriginalHeight',
      ),
    ),
  ),
);
}
