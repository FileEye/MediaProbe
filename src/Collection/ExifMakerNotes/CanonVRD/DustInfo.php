<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection\CollectionBase;

class DustInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVRDDustInfo',
  'title' => 'CanonVRD DustInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'DustDeleteApplied' =>
    array (
      0 => 2,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:DustDeleteApplied' =>
    array (
      0 => 2,
    ),
  ),
  'items' =>
  array (
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'DustDeleteApplied',
        'title' => 'Dust Delete Applied',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'No',
            1 => 'Yes',
          ),
        ),
        'exiftoolDOMNode' => 'CanonVRD:DustDeleteApplied',
      ),
    ),
  ),
);
}
