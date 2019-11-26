<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorDataUnknown extends Collection {

  protected static $map = array (
  'name' => 'CanonColorDataUnknown',
  'title' => 'Canon Color DataUnknown',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorDataVersion',
      'title' => 'Color Data Version',
      'format' =>
      array (
        0 => 8,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'ColorDataVersion' => 0,
  ),
);
}
