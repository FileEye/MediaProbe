<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class MeasuredColor extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonMeasuredColor',
  'title' => 'Canon Measured Color',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Media\\Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\MeasuredColor',
  'itemsByName' =>
  array (
    'MeasuredRGGB' =>
    array (
      0 => 1,
    ),
    'indexSize' =>
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
        'collection' => 'RawData',
        'name' => 'indexSize',
        'format' =>
        array (
          0 => 8,
        ),
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MeasuredRGGB',
        'title' => 'Measured RGGB',
        'components' => 4,
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:MeasuredRGGB',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:MeasuredRGGB' =>
    array (
      0 => 1,
    ),
  ),
);
}
