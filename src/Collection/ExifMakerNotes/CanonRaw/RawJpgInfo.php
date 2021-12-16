<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonRaw;

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
    'RawJpgHeight' =>
    array (
      0 => 4,
    ),
    'RawJpgQuality' =>
    array (
      0 => 1,
    ),
    'RawJpgSize' =>
    array (
      0 => 2,
    ),
    'RawJpgWidth' =>
    array (
      0 => 3,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonRaw:RawJpgHeight' =>
    array (
      0 => 4,
    ),
    'CanonRaw:RawJpgQuality' =>
    array (
      0 => 1,
    ),
    'CanonRaw:RawJpgSize' =>
    array (
      0 => 2,
    ),
    'CanonRaw:RawJpgWidth' =>
    array (
      0 => 3,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'CanonRaw:RawJpgQuality',
      ),
    ),
    2 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'CanonRaw:RawJpgSize',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'RawJpgWidth',
        'title' => 'Raw Jpg Width',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'CanonRaw:RawJpgWidth',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'RawJpgHeight',
        'title' => 'Raw Jpg Height',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'CanonRaw:RawJpgHeight',
      ),
    ),
  ),
);
}
