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
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Apple\\MakerNote',
  'DOMNode' => 'makerNote',
  'defaultItemCollection' => 'Tag',
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
    ),
  ),
  'itemsByName' =>
  array (
    'AccelerationVector' => 8,
    'AppleRuntime' => 3,
    'BurstUUID' => 11,
    'ContentIdentifier' => 17,
    'HDRImageType' => 10,
    'ImageUniqueID' => 21,
  ),
);
}
