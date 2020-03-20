<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection;

class DustInfo extends Collection {

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
  'items' =>
  array (
    2 =>
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
    ),
  ),
  'itemsByName' =>
  array (
    'DustDeleteApplied' => 2,
  ),
);
}
