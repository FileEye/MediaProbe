<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Apple;

use FileEye\MediaProbe\Collection;

class Main extends Collection {

  protected static $map = array (
  'name' => 'Apple',
  'title' => 'Apple Maker Notes',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Apple\\MakerNote',
  'DOMNode' => 'makerNote',
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AccelerationVector' => 8,
    'AppleRuntime' => 3,
    'BurstUUID' => 11,
    'ContentIdentifier' => 17,
    'HDRImageType' => 10,
    'ImageUniqueID' => 21,
  ),
  'items' =>
  array (
    3 =>
    array (
      'name' => 'AppleRuntime',
      'collection' => 'MakerNotes\\Apple\\RunTime',
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'AccelerationVector',
      'title' => 'Acceleration Vector',
      'components' => 3,
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'Apple:AccelerationVector',
    ),
    10 =>
    array (
      'collection' => 'Tag',
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
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'BurstUUID',
      'title' => 'Burst UUID',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'Apple:BurstUUID',
    ),
    17 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContentIdentifier',
      'title' => 'Content Identifier',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'Apple:ContentIdentifier',
    ),
    21 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageUniqueID',
      'title' => 'Image Unique ID',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'Apple:ImageUniqueID',
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Apple:AccelerationVector' => 8,
    'Apple:BurstUUID' => 11,
    'Apple:ContentIdentifier' => 17,
    'Apple:HDRImageType' => 10,
    'Apple:ImageUniqueID' => 21,
  ),
);
}
