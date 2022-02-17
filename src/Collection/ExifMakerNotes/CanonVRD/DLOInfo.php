<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection\CollectionBase;

class DLOInfo extends CollectionBase {

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
  'itemsByName' =>
  array (
    'DLOData' =>
    array (
      0 => 10,
    ),
    'DLOSettingApplied' =>
    array (
      0 => 4,
    ),
    'DLOVersion' =>
    array (
      0 => 5,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:DLOData' =>
    array (
      0 => 10,
    ),
    'CanonVRD:DLOSettingApplied' =>
    array (
      0 => 4,
    ),
    'CanonVRD:DLOVersion' =>
    array (
      0 => 5,
    ),
  ),
  'items' =>
  array (
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'DLOSettingApplied',
        'title' => 'DLO Setting Applied',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'CanonVRD:DLOSettingApplied',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'DLOVersion',
        'title' => 'DLO Version',
        'components' => 10,
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'CanonVRD:DLOVersion',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'DLOData',
        'title' => 'DLO Data',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'CanonVRD:DLOData',
      ),
    ),
  ),
);
}
