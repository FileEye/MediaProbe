<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class ColorDataUnknown extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonColorDataUnknown',
  'title' => 'Canon Color DataUnknown',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\ColorDataUnknown',
  'itemsByName' =>
  array (
    'ColorDataVersion' =>
    array (
      0 => 0,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ColorDataVersion',
        'title' => 'Color Data Version',
        'format' =>
        array (
          0 => 8,
        ),
      ),
    ),
  ),
);
}
