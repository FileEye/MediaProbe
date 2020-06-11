<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class RawJpgInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonRawRawJpgInfo',
  'title' => 'CanonRaw RawJpgInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'RawJpgHeight' => 4,
    'RawJpgQuality' => 1,
    'RawJpgSize' => 2,
    'RawJpgWidth' => 3,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawJpgQuality',
      'title' => 'Raw Jpg Quality',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Economy',
          2 => 'Normal',
          3 => 'Fine',
          5 => 'Superfine',
        ),
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawJpgSize',
      'title' => 'Raw Jpg Size',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Large',
          1 => 'Medium',
          2 => 'Small',
        ),
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawJpgWidth',
      'title' => 'Raw Jpg Width',
      'format' =>
      array (
        0 => 3,
      ),
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawJpgHeight',
      'title' => 'Raw Jpg Height',
      'format' =>
      array (
        0 => 3,
      ),
    ),
  ),
);
}
