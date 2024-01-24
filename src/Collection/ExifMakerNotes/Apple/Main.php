<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Apple;

use FileEye\MediaProbe\Collection\CollectionBase;

class Main extends CollectionBase {

  protected static $map = array (
  'name' => 'Apple',
  'title' => 'Apple Maker Notes',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Apple\\MakerNote',
  'DOMNode' => 'makerNote',
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Apple\\Main',
  'itemsByName' =>
  array (
    'AccelerationVector' =>
    array (
      0 => 8,
    ),
    'AppleRuntime' =>
    array (
      0 => 3,
    ),
    'BurstUUID' =>
    array (
      0 => 11,
    ),
    'ContentIdentifier' =>
    array (
      0 => 17,
    ),
    'HDRImageType' =>
    array (
      0 => 10,
    ),
    'ImageUniqueID' =>
    array (
      0 => 21,
    ),
  ),
  'items' =>
  array (
    3 =>
    array (
      0 =>
      array (
        'name' => 'AppleRuntime',
        'collection' => 'ExifMakerNotes\\Apple\\RunTime',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AccelerationVector',
        'title' => 'Acceleration Vector',
        'components' => 3,
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'Apple:AccelerationVector',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'HDRImageType',
        'title' => 'HDR Image Type',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            3 => 'HDR Image',
            4 => 'Original Image',
          ),
        ),
        'exiftoolDOMNode' => 'Apple:HDRImageType',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BurstUUID',
        'title' => 'Burst UUID',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:BurstUUID',
      ),
    ),
    17 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ContentIdentifier',
        'title' => 'Content Identifier',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:ContentIdentifier',
      ),
    ),
    21 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ImageUniqueID',
        'title' => 'Image Unique ID',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:ImageUniqueID',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Apple:AccelerationVector' =>
    array (
      0 => 8,
    ),
    'Apple:BurstUUID' =>
    array (
      0 => 11,
    ),
    'Apple:ContentIdentifier' =>
    array (
      0 => 17,
    ),
    'Apple:HDRImageType' =>
    array (
      0 => 10,
    ),
    'Apple:ImageUniqueID' =>
    array (
      0 => 21,
    ),
  ),
);
}
