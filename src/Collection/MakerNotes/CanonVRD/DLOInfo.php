<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection;

class DLOInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonVRDDLOInfo',
  'title' => 'CanonVRD DLOInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'DLOSettingApplied',
      'title' => 'DLO Setting Applied',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'DLOVersion',
      'title' => 'DLO Version',
      'components' => 10,
      'format' =>
      array (
        0 => 2,
      ),
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'DLOData',
      'title' => 'DLO Data',
      'format' =>
      array (
        0 => 7,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'DLOData' => 10,
    'DLOSettingApplied' => 4,
    'DLOVersion' => 5,
  ),
);
}
