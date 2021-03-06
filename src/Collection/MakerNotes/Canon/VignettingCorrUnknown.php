<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class VignettingCorrUnknown extends Collection {

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
    'VignettingCorrVersion' => 0,
  ),
  'items' =>
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
);
}
