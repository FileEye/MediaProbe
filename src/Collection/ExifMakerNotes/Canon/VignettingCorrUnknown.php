<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class VignettingCorrUnknown extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVignettingCorrUnknown',
  'title' => 'Canon VignettingCorrUnknown',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'VignettingCorrVersion' =>
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
        'collection' => 'Tag',
        'name' => 'VignettingCorrVersion',
        'title' => 'Vignetting Corr Version',
        'format' =>
        array (
          0 => 1,
        ),
      ),
    ),
  ),
);
}
