<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class MakeModel extends Collection {

  protected static $map = array (
  'name' => 'CanonRawMakeModel',
  'title' => 'CanonRaw MakeModel',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'Make' => 0,
    'Model' => 6,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'Make',
      'title' => 'Make',
      'components' => 6,
      'format' =>
      array (
        0 => 2,
      ),
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'Model',
      'title' => 'Camera Model Name',
      'format' =>
      array (
        0 => 2,
      ),
    ),
  ),
);
}
