<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class Flags extends Collection {

  protected static $map = array (
  'name' => 'CanonFlags',
  'title' => 'Canon Flags',
  'class' => 'FileEye\\MediaProbe\\Block\\Ifd',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifiedParamFlag',
      'title' => 'Modified Param Flag',
      'format' =>
      array (
        0 => 8,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'ModifiedParamFlag' => 1,
  ),
);
}
